<?php

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetSessionCapping;
use CCK\LaravelWahaSaloonSdk\Waha\Waha;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

describe('GetSessionCapping', function () {
    it('reads the message capping of a session', function () {
        $request = new GetSessionCapping('default');

        expect($request->getMethod())->toBe(Method::GET)
            ->and($request->resolveEndpoint())->toBe('/api/sessions/default/capping');
    });

    it('is sent from the sessions resource', function () {
        $mockClient = new MockClient([
            GetSessionCapping::class => MockResponse::make([
                'cappingStatus' => 'FIRST_WARNING',
                'totalQuota' => 1000,
                'usedQuota' => 800,
                'cycleStart' => 1790784000,
                'cycleEnd' => 1793462399,
            ]),
        ]);
        $waha = (new Waha(baseUrl: 'https://example.com'))->withMockClient($mockClient);

        $response = $waha->sessions()->getSessionCapping('pixalink_ck_0-0');

        $mockClient->assertSent(fn ($request) => $request instanceof GetSessionCapping
            && $request->resolveEndpoint() === '/api/sessions/pixalink_ck_0-0/capping');
        expect($response->json('cappingStatus'))->toBe('FIRST_WARNING');
    });
});
