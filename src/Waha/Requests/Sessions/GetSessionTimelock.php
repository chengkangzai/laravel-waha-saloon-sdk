<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the session's reach-out timelock: whether WhatsApp bars it from starting chats with new contacts, and until when
 */
class GetSessionTimelock extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/sessions/{$this->session}/timelock";
    }

    public function __construct(
        protected string $session,
    ) {}
}
