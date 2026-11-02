<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Passkey;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Submit a WebAuthn passkey assertion to finish pairing.
 */
class SubmitPasskeyAssertion extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/auth/passkey";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected string $rawId,
        protected string $type,
        protected array $assertionResponse,
    ) {}

    public function defaultBody(): array
    {
        $isNotNull = fn ($value) => $value !== null;

        return array_filter([
            'id' => $this->id,
            'rawId' => $this->rawId,
            'type' => $this->type,
            'response' => $this->assertionResponse,
        ], $isNotNull);
    }
}
