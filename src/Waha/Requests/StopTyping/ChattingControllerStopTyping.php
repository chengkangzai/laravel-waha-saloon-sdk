<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\StopTyping;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Chatting Controller stop Typing
 */
class ChattingControllerStopTyping extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/stopTyping';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $session = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['chatId' => $this->chatId, 'session' => $this->session]);
    }
}
