<?php

use CCK\LaravelWahaSaloonSdk\Waha\Waha;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

$contracts = json_decode(file_get_contents(__DIR__.'/../Fixtures/waha-2026.9.2-contracts.json'), true, flags: JSON_THROW_ON_ERROR);
$resources = [];

foreach ($contracts['resources'] as $method => $request) {
    $resources[$method] = [$method, $request, $contracts['requests'][$request]];
}

it('forwards each resource method to the correct request without shifting arguments', function (string $resourceMethod, string $requestClass, array $contract) {
    [$class, $method] = explode('::', $resourceMethod);
    $arguments = [];

    foreach ((new ReflectionMethod($class, $method))->getParameters() as $parameter) {
        $name = $parameter->getName();
        $requestName = match ($name) {
            'config' => array_key_exists('sessionConfig', $contract['arguments']) ? 'sessionConfig' : 'appConfig',
            'body' => 'messageBody',
            'method' => 'authMethod',
            default => $name,
        };
        $arguments[$name] = $contract['arguments'][$requestName] ?? $parameter->getDefaultValue();
    }

    $mock = new MockClient([MockResponse::make([])]);
    $waha = new Waha('https://example.com');
    $waha->withMockClient($mock);
    $resource = new $class($waha);
    $resource->{$method}(...$arguments);
    $request = $mock->getLastPendingRequest()->getRequest();
    $query = $request->query()->all();
    $body = $request instanceof HasBody ? $request->body()->all() : [];
    ksort($query);
    ksort($body);
    ksort($contract['query']);
    ksort($contract['body']);

    expect($request)->toBeInstanceOf($requestClass)
        ->and($request->getMethod()->value)->toBe($contract['method'])
        ->and($request->resolveEndpoint())->toBe($contract['endpoint'])
        ->and($query)->toBe($contract['query'])
        ->and($body)->toBe($contract['body']);
    $mock->assertSentCount(1);
})->with($resources);

it('exposes a connector accessor for every resource and a resource method for all operations', function () use ($contracts) {
    $waha = new Waha('https://example.com');
    $reachable = [];

    foreach ((new ReflectionClass($waha))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        $type = $method->getReturnType();

        if (! $type instanceof ReflectionNamedType || ! str_starts_with($type->getName(), 'CCK\\LaravelWahaSaloonSdk\\Waha\\Resource\\')) {
            continue;
        }

        expect($method->invoke($waha))->toBeInstanceOf($type->getName());
        $reachable[] = $type->getName();
    }

    foreach (glob(__DIR__.'/../../src/Waha/Resource/*.php') as $file) {
        expect($reachable)->toContain('CCK\\LaravelWahaSaloonSdk\\Waha\\Resource\\'.basename($file, '.php'));
    }

    $operations = array_map(function (string $class) use ($contracts) {
        $contract = $contracts['requests'][$class];

        return $contract['method'].' '.$contract['path'];
    }, $contracts['resources']);

    expect(array_unique($operations))->toHaveCount(194);
});
