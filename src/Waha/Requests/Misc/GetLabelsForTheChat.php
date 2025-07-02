<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get labels for the chat
 */
class GetLabelsForTheChat extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/labels/chats/{$this->chatId}";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
    ) {}
}
