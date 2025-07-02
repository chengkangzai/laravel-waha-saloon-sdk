<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Api;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Deletes the chat
 */
class DeletesTheChat extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
    ) {}
}
