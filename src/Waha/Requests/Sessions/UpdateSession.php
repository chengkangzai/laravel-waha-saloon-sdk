<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update a session
 */
class UpdateSession extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/sessions/{$this->session}";
    }

    public function __construct(
        protected string $session,
        protected mixed $name = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name]);
    }
}
