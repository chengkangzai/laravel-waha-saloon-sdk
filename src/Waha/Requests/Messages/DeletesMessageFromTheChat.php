<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Deletes a message from the chat
 */
class DeletesMessageFromTheChat extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}/messages/{$this->messageId}";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
        protected string $messageId,
    ) {}
}
