<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Events;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send an event message
 */
class SendEventMessage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/events";
    }

    public function __construct(
        protected string $session,
        protected mixed $chatId = null,
        protected mixed $event = null,
        protected mixed $replyTo = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['chatId' => $this->chatId, 'event' => $this->event, 'reply_to' => $this->replyTo]);
    }
}
