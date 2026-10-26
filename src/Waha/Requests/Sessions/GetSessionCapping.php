<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the session's message capping: its monthly quota of messages to contacts with no existing chat
 */
class GetSessionCapping extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/sessions/{$this->session}/capping";
    }

    public function __construct(
        protected string $session,
    ) {}
}
