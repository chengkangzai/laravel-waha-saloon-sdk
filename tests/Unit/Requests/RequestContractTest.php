<?php

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;

$contracts = json_decode(file_get_contents(__DIR__.'/../../Fixtures/waha-2026.9.2-contracts.json'), true, flags: JSON_THROW_ON_ERROR);

dataset('WAHA request contracts', array_map(
    fn (string $class, array $contract) => [$class, $contract],
    array_keys($contracts['requests']),
    array_values($contracts['requests']),
));

it('matches the spec method, endpoint, query and JSON body for every request', function (string $class, array $contract) {
    $request = new $class(...$contract['arguments']);
    $query = $request->query()->all();
    $body = $request instanceof HasBody ? $request->body()->all() : [];
    ksort($query);
    ksort($body);
    ksort($contract['query']);
    ksort($contract['body']);

    expect($request)->toBeInstanceOf(Request::class)
        ->and($request->getMethod())->toBe(Method::from($contract['method']))
        ->and($request->resolveEndpoint())->toBe($contract['endpoint'])
        ->and($query)->toBe($contract['query'])
        ->and($body)->toBe($contract['body']);
})->with('WAHA request contracts');

it('omits optional null arguments while retaining required falsy values', function (string $class, array $contract) {
    $arguments = $contract['arguments'];
    $constructor = (new ReflectionClass($class))->getConstructor();

    foreach ($constructor?->getParameters() ?? [] as $parameter) {
        if ($parameter->isOptional() && $parameter->allowsNull() && ! str_contains($contract['path'], '{'.$parameter->getName().'}')) {
            $arguments[$parameter->getName()] = null;
        }
    }

    $request = new $class(...$arguments);
    $query = $request->query()->all();
    $body = $request instanceof HasBody ? $request->body()->all() : [];

    expect($query)->not->toContain(null)
        ->and($body)->not->toContain(null)
        ->and($request->resolveEndpoint())->toBe($contract['endpoint']);
})->with('WAHA request contracts');

it('still accepts legacy string query arguments', function (string $class, string $parameter, array $arguments) {
    $request = new $class(...$arguments);

    expect((new ReflectionProperty($class, $parameter))->getValue($request))->toBe('0')
        ->and($request->query()->all())->toContain('0');
})->with($contracts['legacyQueries']);

it('covers every request file and all 194 operations', function () use ($contracts) {
    $files = glob(__DIR__.'/../../../src/Waha/Requests/*/*.php');
    $classes = array_map(function (string $file) {
        return 'CCK\\LaravelWahaSaloonSdk\\Waha\\Requests\\'.basename(dirname($file)).'\\'.basename($file, '.php');
    }, $files);
    $covered = array_keys($contracts['requests']);
    sort($classes);
    sort($covered);

    expect($covered)->toBe($classes)
        ->and(array_unique(array_map(fn (array $contract) => $contract['method'].' '.$contract['path'], $contracts['requests'])))->toHaveCount(194);
});

it('does not shadow Saloon base properties with constructor fields', function (string $class) {
    $baseProperties = array_map(fn (ReflectionProperty $property) => $property->getName(), (new ReflectionClass(Request::class))->getProperties());
    $constructor = (new ReflectionClass($class))->getConstructor();

    foreach ($constructor?->getParameters() ?? [] as $parameter) {
        expect($baseProperties)->not->toContain($parameter->getName());
    }

    expect(is_subclass_of($class, Request::class))->toBeTrue();
})->with(array_keys($contracts['requests']));
