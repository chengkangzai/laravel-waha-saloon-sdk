<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Pin;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Pins a message in the chat
 */
class PinsMessageInTheChat extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}/messages/{$this->messageId}/pin";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
        protected string $messageId,
        protected mixed $duration = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['duration' => $this->duration]);
    }
}
