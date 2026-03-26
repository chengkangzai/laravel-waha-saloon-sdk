<?php

use CCK\LaravelWahaSaloonSdk\Waha\Waha;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

describe('Waha AlwaysThrowOnErrors', function () {
    it('throws RequestException on error responses by default', function () {
        config()->set('waha-saloon-sdk.always_throw_on_errors', true);

        $waha = new Waha(baseUrl: 'https://example.com');

        $mockClient = new MockClient([
            MockResponse::make('Internal Server Error', 500),
        ]);

        $waha->withMockClient($mockClient);

        $waha->sessions()->getSessionInformation('test', null);
    })->throws(RequestException::class);

    it('does not throw when always_throw_on_errors is disabled', function () {
        config()->set('waha-saloon-sdk.always_throw_on_errors', false);

        $waha = new Waha(baseUrl: 'https://example.com');

        $mockClient = new MockClient([
            MockResponse::make('Internal Server Error', 500),
        ]);

        $waha->withMockClient($mockClient);

        $response = $waha->sessions()->getSessionInformation('test', null);

        expect($response->status())->toBe(500);
    });
});
