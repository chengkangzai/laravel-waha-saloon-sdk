<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Save labels for the chat
 */
class SaveLabelsForTheChat extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/labels/chats/{$this->chatId}";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
        protected mixed $labels = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['labels' => $this->labels]);
    }
}
