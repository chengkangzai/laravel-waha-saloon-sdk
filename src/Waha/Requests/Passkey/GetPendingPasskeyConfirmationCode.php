<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Passkey;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the pending passkey confirmation code.
 */
class GetPendingPasskeyConfirmationCode extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/auth/passkey/confirmation";
    }

    public function __construct(
        protected string $session,
    ) {}
}
