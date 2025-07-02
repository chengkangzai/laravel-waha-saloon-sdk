<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a session
 */
class UpdateSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/sessions/{$this->session}";
    }

    public function __construct(
        protected string $session,
        protected mixed $sessionConfig = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['config' => $this->sessionConfig]);
    }
}
