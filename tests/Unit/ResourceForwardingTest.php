<?php

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\UpdateSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Admin;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Search;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Send;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Server;
use CCK\LaravelWahaSaloonSdk\Waha\Waha;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;

it('forwards app updates without shifting their payload fields', function () {
    $mock = new MockClient([MockResponse::make([])]);
    $waha = new Waha('https://example.com');
    $waha->withMockClient($mock);

    $waha->apps()->updateExistingApp('app-id', 'default', 'chatwoot', ['url' => 'https://chat.example'], false);

    $mock->assertSent(fn (Request $request) => $request->resolveEndpoint() === '/api/apps/app-id'
        && $request->body()->all() === [
            'id' => 'app-id',
            'session' => 'default',
            'app' => 'chatwoot',
            'config' => ['url' => 'https://chat.example'],
            'enabled' => false,
        ]);
});

it('forwards session expansion and all independently', function () {
    $mock = new MockClient([MockResponse::make([])]);
    $waha = new Waha('https://example.com');
    $waha->withMockClient($mock);

    $waha->misc()->listAllSessions(['apps'], false);

    $mock->assertSent(fn (Request $request) => $request->query()->all() === ['expand' => ['apps'], 'all' => false]);
});

it('accepts optional resource arguments and native query values', function () {
    $mock = new MockClient([MockResponse::make([]), MockResponse::make([])]);
    $waha = new Waha('https://example.com');
    $waha->withMockClient($mock);

    $waha->sessions()->getSessionInformation('default');
    $waha->misc()->getAllGroups('default', limit: 0, offset: 0, exclude: ['participants']);

    $mock->assertSent(fn (Request $request) => $request->resolveEndpoint() === '/api/sessions/default'
        && $request->query()->all() === []);
    $mock->assertSent(fn (Request $request) => $request->query()->all() === ['limit' => 0, 'offset' => 0, 'exclude' => ['participants']]);
});

it('supports the session configuration and apps without colliding with Saloon config', function () {
    $create = new CreateSession(name: 'default', apps: [], start: false, sessionConfig: ['debug' => false]);
    $update = new UpdateSession('default', 'legacy-name', ['debug' => false], []);

    expect($create->body()->all())->toBe(['name' => 'default', 'apps' => [], 'start' => false, 'config' => ['debug' => false]])
        ->and($update->body()->all())->toBe(['config' => ['debug' => false], 'apps' => []])
        ->and($create->config()->all())->toBe([])
        ->and($update->config()->all())->toBe([]);
});

it('exposes each previously advertised resource on the connector', function (string $method, string $class) {
    expect((new Waha('https://example.com'))->{$method}())->toBeInstanceOf($class);
})->with([
    ['admin', Admin::class],
    ['server', Server::class],
    ['search', Search::class],
    ['sending', Send::class],
]);
