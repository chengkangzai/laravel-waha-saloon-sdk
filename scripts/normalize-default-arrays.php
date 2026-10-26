<?php

declare(strict_types=1);

/*
 * Post-generation normalizer.
 *
 * The SDK generator emits `array_filter([...])` with no callback for every
 * defaultQuery()/defaultBody(). The default callback strips ALL falsy values
 * (false, 0, '0', '', []), which means an explicit `false`/`0` can never reach
 * the API (e.g. downloadMedia=false, star=false to unstar, offset=0).
 *
 * This rewrites every single-argument `array_filter([...])` to drop only null:
 *   array_filter([...], fn ($value) => $value !== null)
 *
 * Run after `sdkgenerator generate:sdk`. Idempotent: a call that already has a
 * second argument is left untouched.
 *
 * Usage: php build/normalize-default-arrays.php [path ...]
 */

$paths = array_slice($argv, 1);

if ($paths === []) {
    $paths = [dirname(__DIR__).'/src'];
}

$callback = ', fn ($value) => $value !== null';
$changedFiles = 0;
$changedCalls = 0;

foreach ($paths as $path) {
    foreach (phpFiles($path) as $file) {
        $code = file_get_contents($file);
        [$newCode, $count] = normalize($code, $callback);

        if ($count === 0) {
            continue;
        }

        file_put_contents($file, $newCode);
        $changedFiles++;
        $changedCalls += $count;
        echo "normalized {$count} call(s): {$file}\n";
    }
}

echo "Done. {$changedCalls} array_filter call(s) across {$changedFiles} file(s).\n";

/**
 * @return iterable<string>
 */
function phpFiles(string $path): iterable
{
    if (is_file($path)) {
        yield $path;

        return;
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            yield $file->getPathname();
        }
    }
}

/**
 * @return array{0: string, 1: int}
 */
function normalize(string $code, string $callback): array
{
    $tokens = PhpToken::tokenize($code);
    $count = count($tokens);
    $insertOffsets = [];

    for ($i = 0; $i < $count; $i++) {
        if (! $tokens[$i]->is(T_STRING) || $tokens[$i]->text !== 'array_filter') {
            continue;
        }

        // Skip method/property access like $foo->array_filter (defensive).
        $prev = previousMeaningful($tokens, $i);
        if ($prev !== null && $tokens[$prev]->is([T_OBJECT_OPERATOR, T_NULLSAFE_OBJECT_OPERATOR, T_DOUBLE_COLON])) {
            continue;
        }

        $open = nextMeaningful($tokens, $i);
        if ($open === null || $tokens[$open]->text !== '(') {
            continue;
        }

        $paren = 0;
        $bracket = 0;
        $brace = 0;
        $hasTopLevelComma = false;
        $closeOffset = null;

        for ($k = $open; $k < $count; $k++) {
            $text = $tokens[$k]->text;

            if ($text === '(') {
                $paren++;
            } elseif ($text === ')') {
                $paren--;
                if ($paren === 0) {
                    $closeOffset = $tokens[$k]->pos;
                    break;
                }
            } elseif ($text === '[') {
                $bracket++;
            } elseif ($text === ']') {
                $bracket--;
            } elseif ($text === '{') {
                $brace++;
            } elseif ($text === '}') {
                $brace--;
            } elseif ($text === ',' && $paren === 1 && $bracket === 0 && $brace === 0) {
                $hasTopLevelComma = true;
            }
        }

        if ($closeOffset === null || $hasTopLevelComma) {
            continue;
        }

        $insertOffsets[] = $closeOffset;
    }

    if ($insertOffsets === []) {
        return [$code, 0];
    }

    // Splice from the end so earlier offsets stay valid.
    rsort($insertOffsets);

    foreach ($insertOffsets as $offset) {
        $code = substr($code, 0, $offset).$callback.substr($code, $offset);
    }

    return [$code, count($insertOffsets)];
}

/**
 * @param  array<int, PhpToken>  $tokens
 */
function nextMeaningful(array $tokens, int $index): ?int
{
    for ($j = $index + 1, $n = count($tokens); $j < $n; $j++) {
        if (! $tokens[$j]->is([T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])) {
            return $j;
        }
    }

    return null;
}

/**
 * @param  array<int, PhpToken>  $tokens
 */
function previousMeaningful(array $tokens, int $index): ?int
{
    for ($j = $index - 1; $j >= 0; $j--) {
        if (! $tokens[$j]->is([T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])) {
            return $j;
        }
    }

    return null;
}
