<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\NewMessageId;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Generate a new message ID.
 */
class GenerateNewMessageId extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/new-message-id";
    }

    public function __construct(
        protected string $session,
    ) {}
}
