<?php

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetSessionTimelock;
use CCK\LaravelWahaSaloonSdk\Waha\Waha;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

describe('GetSessionTimelock', function () {
    it('reads the reach-out timelock of a session', function () {
        $request = new GetSessionTimelock('default');

        expect($request->getMethod())->toBe(Method::GET)
            ->and($request->resolveEndpoint())->toBe('/api/sessions/default/timelock');
    });

    it('is sent from the sessions resource', function () {
        $mockClient = new MockClient([
            GetSessionTimelock::class => MockResponse::make([
                'enforcementType' => 'DEFAULT',
                'isActive' => true,
                'timeEnforcementEnds' => 1793462399,
            ]),
        ]);
        $waha = (new Waha(baseUrl: 'https://example.com'))->withMockClient($mockClient);

        $response = $waha->sessions()->getSessionTimelock('pixalink_ck_0-0');

        $mockClient->assertSent(fn ($request) => $request instanceof GetSessionTimelock
            && $request->resolveEndpoint() === '/api/sessions/pixalink_ck_0-0/timelock');
        expect($response->json('isActive'))->toBeTrue()
            ->and($response->json('timeEnforcementEnds'))->toBe(1793462399);
    });
});
