<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Star or unstar a message
 */
class StarOrUnstarMessage extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/api/star';
    }

    public function __construct(
        protected mixed $messageId = null,
        protected mixed $chatId = null,
        protected mixed $star = null,
        protected mixed $session = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['messageId' => $this->messageId, 'chatId' => $this->chatId, 'star' => $this->star, 'session' => $this->session]);
    }
}
