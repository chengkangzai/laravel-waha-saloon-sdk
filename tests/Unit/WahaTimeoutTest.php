<?php

use CCK\LaravelWahaSaloonSdk\Waha\Waha;

describe('Waha Timeout', function () {
    it('has default timeout values', function () {
        $waha = new Waha(baseUrl: 'https://example.com');

        expect($waha->getConnectTimeout())->toBe(10.0)
            ->and($waha->getRequestTimeout())->toBe(60.0);
    });

    it('reads timeout from config', function () {
        config()->set('waha-saloon-sdk.connect_timeout', 5);
        config()->set('waha-saloon-sdk.timeout', 120);

        $waha = new Waha(baseUrl: 'https://example.com');

        expect($waha->getConnectTimeout())->toBe(5.0)
            ->and($waha->getRequestTimeout())->toBe(120.0);
    });

    it('falls back to defaults when config is not set', function () {
        config()->set('waha-saloon-sdk.connect_timeout', null);
        config()->set('waha-saloon-sdk.timeout', null);

        $waha = new Waha(baseUrl: 'https://example.com');

        expect($waha->getConnectTimeout())->toBe(10.0)
            ->and($waha->getRequestTimeout())->toBe(60.0);
    });
});
