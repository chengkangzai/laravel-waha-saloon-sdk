<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Passkey;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the pending passkey (WebAuthn) challenge.
 */
class GetPendingPasskeyChallenge extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/auth/passkey/challenge";
    }

    public function __construct(
        protected string $session,
    ) {}
}
