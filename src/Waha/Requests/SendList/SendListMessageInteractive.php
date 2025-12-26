<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendList;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send a list message (interactive)
 */
class SendListMessageInteractive extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendList';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $message = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['chatId' => $this->chatId, 'message' => $this->message, 'session' => $this->session, 'reply_to' => $this->replyTo]);
    }
}
