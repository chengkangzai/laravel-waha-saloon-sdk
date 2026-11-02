<?php

$api = json_decode(file_get_contents(__DIR__.'/../Fixtures/waha-public-api-before-sync.json'), true, flags: JSON_THROW_ON_ERROR);
$cases = [];

foreach ($api as $class => $methods) {
    $cases[$class] = [$class, $methods];
}

it('preserves existing public method names, argument order and accepted types', function (string $class, array $methods) {
    expect(class_exists($class))->toBeTrue();

    foreach ($methods as $name => $parameters) {
        $method = new ReflectionMethod($class, $name);
        expect($method->isPublic())->toBeTrue();
        $current = $method->getParameters();

        foreach ($parameters as $position => $parameter) {
            expect($current[$position]->getName())->toBe($parameter['name']);
            $oldTypes = explode('|', str_replace('?', 'null|', $parameter['type']));
            $newTypes = explode('|', str_replace('?', 'null|', (string) $current[$position]->getType()));

            foreach ($oldTypes as $type) {
                expect($newTypes)->toContain($type);
            }

            if ($parameter['optional']) {
                expect($current[$position]->isOptional())->toBeTrue();
            }
        }

        foreach (array_slice($current, count($parameters)) as $parameter) {
            expect($parameter->isOptional())->toBeTrue();
        }
    }
})->with($cases);
