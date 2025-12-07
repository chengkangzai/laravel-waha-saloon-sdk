<?php

use CCK\LaravelWahaSaloonSdk\Waha\Waha;
use CCK\LaravelWahaSaloonSdk\WahaManager;

describe('WahaManager', function () {
    it('creates connection from config', function () {
        $manager = new WahaManager([
            'default' => 'default',
            'connections' => [
                'default' => [
                    'base_url' => 'https://test.example.com',
                    'api_key' => 'test-key',
                ],
            ],
        ]);

        $connection = $manager->connection();

        expect($connection)->toBeInstanceOf(Waha::class);
        expect($connection->resolveBaseUrl())->toBe('https://test.example.com');
    });

    it('caches connections', function () {
        $manager = new WahaManager([
            'default' => 'default',
            'connections' => [
                'default' => [
                    'base_url' => 'https://test.example.com',
                    'api_key' => null,
                ],
            ],
        ]);

        $first = $manager->connection();
        $second = $manager->connection();

        expect($first)->toBe($second);
    });

    it('throws exception for unconfigured connection', function () {
        $manager = new WahaManager([
            'connections' => [],
        ]);

        $manager->connection('nonexistent');
    })->throws(InvalidArgumentException::class, 'WAHA connection [nonexistent] not configured.');

    it('supports multiple connections', function () {
        $manager = new WahaManager([
            'default' => 'default',
            'connections' => [
                'default' => [
                    'base_url' => 'https://default.example.com',
                    'api_key' => null,
                ],
                'production' => [
                    'base_url' => 'https://prod.example.com',
                    'api_key' => 'prod-key',
                ],
            ],
        ]);

        $default = $manager->connection('default');
        $production = $manager->connection('production');

        expect($default->resolveBaseUrl())->toBe('https://default.example.com');
        expect($production->resolveBaseUrl())->toBe('https://prod.example.com');
    });

    it('falls back to legacy config for default connection', function () {
        $manager = new WahaManager([
            'default' => 'default',
            'connections' => [
                'default' => [
                    'base_url' => '',
                    'api_key' => '',
                ],
            ],
            'base_url' => 'https://legacy.example.com',
            'api_key' => 'legacy-key',
        ]);

        $connection = $manager->connection();

        expect($connection->resolveBaseUrl())->toBe('https://legacy.example.com');
    });

    it('can get and set default connection', function () {
        $manager = new WahaManager([
            'default' => 'default',
            'connections' => [
                'default' => [
                    'base_url' => 'https://default.example.com',
                    'api_key' => null,
                ],
                'other' => [
                    'base_url' => 'https://other.example.com',
                    'api_key' => null,
                ],
            ],
        ]);

        expect($manager->getDefaultConnection())->toBe('default');

        $manager->setDefaultConnection('other');

        expect($manager->getDefaultConnection())->toBe('other');
        expect($manager->connection()->resolveBaseUrl())->toBe('https://other.example.com');
    });

    it('can purge a connection', function () {
        $manager = new WahaManager([
            'default' => 'default',
            'connections' => [
                'default' => [
                    'base_url' => 'https://test.example.com',
                    'api_key' => null,
                ],
            ],
        ]);

        $first = $manager->connection();
        $manager->purge();
        $second = $manager->connection();

        expect($first)->not->toBe($second);
    });

    it('can purge all connections', function () {
        $manager = new WahaManager([
            'default' => 'default',
            'connections' => [
                'default' => [
                    'base_url' => 'https://default.example.com',
                    'api_key' => null,
                ],
                'other' => [
                    'base_url' => 'https://other.example.com',
                    'api_key' => null,
                ],
            ],
        ]);

        $manager->connection('default');
        $manager->connection('other');

        expect($manager->getConnections())->toHaveCount(2);

        $manager->purgeAll();

        expect($manager->getConnections())->toHaveCount(0);
    });

    it('proxies method calls to default connection', function () {
        $manager = new WahaManager([
            'default' => 'default',
            'connections' => [
                'default' => [
                    'base_url' => 'https://test.example.com',
                    'api_key' => null,
                ],
            ],
        ]);

        // The sessions() method should be proxied to the default connection
        $sessions = $manager->sessions();

        expect($sessions)->toBeInstanceOf(\CCK\LaravelWahaSaloonSdk\Waha\Resource\Sessions::class);
    });
});
