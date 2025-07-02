<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete the session
 */
class DeleteTheSession extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/api/sessions/{$this->session}";
    }

    public function __construct(
        protected string $session,
    ) {}
}
