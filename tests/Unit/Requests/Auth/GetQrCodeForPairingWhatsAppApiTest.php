<?php

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Auth\GetQrCodeForPairingWhatsAppApi;

describe('GetQrCodeForPairingWhatsAppApi', function () {
    it('can be constructed with basic parameters', function () {
        $request = new GetQrCodeForPairingWhatsAppApi('default', 'image');

        expect($request->resolveEndpoint())->toBe('/api/default/auth/qr');
        expect($request->defaultQuery())->toBe(['format' => 'image']);
        expect($request->defaultHeaders())->toBe([]);
    });

    it('can be constructed with accept header', function () {
        $request = new GetQrCodeForPairingWhatsAppApi('default', null, 'application/json');

        expect($request->defaultHeaders())->toBe(['Accept' => 'application/json']);
    });

    it('can create binary image request', function () {
        $request = GetQrCodeForPairingWhatsAppApi::forBinaryImage('test-session');

        expect($request->resolveEndpoint())->toBe('/api/test-session/auth/qr');
        expect($request->defaultHeaders())->toBe(['Accept' => 'image/png']);
        expect($request->defaultQuery())->toBe([]);
    });

    it('can create base64 image request', function () {
        $request = GetQrCodeForPairingWhatsAppApi::forBase64Image('test-session');

        expect($request->resolveEndpoint())->toBe('/api/test-session/auth/qr');
        expect($request->defaultHeaders())->toBe(['Accept' => 'application/json']);
        expect($request->defaultQuery())->toBe([]);
    });

    it('can create raw value request', function () {
        $request = GetQrCodeForPairingWhatsAppApi::forRawValue('test-session');

        expect($request->resolveEndpoint())->toBe('/api/test-session/auth/qr');
        expect($request->defaultHeaders())->toBe(['Accept' => 'application/json']);
        expect($request->defaultQuery())->toBe(['format' => 'raw']);
    });

    it('filters out null format from query', function () {
        $request = new GetQrCodeForPairingWhatsAppApi('default', null);

        expect($request->defaultQuery())->toBe([]);
    });
});
