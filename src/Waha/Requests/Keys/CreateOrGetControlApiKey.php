<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create or get a control-only API key for a session.
 */
class CreateOrGetControlApiKey extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/keys/control';
    }

    public function __construct(
        protected string $session,
    ) {}

    public function defaultBody(): array
    {
        $isNotNull = fn ($value) => $value !== null;

        return array_filter([
            'session' => $this->session,
        ], $isNotNull);
    }
}
