<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Passkey;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Confirm passkey pairing (only needed for the manual code case).
 */
class ConfirmPasskeyPairing extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/auth/passkey/confirm";
    }

    public function __construct(
        protected string $session,
    ) {}
}
