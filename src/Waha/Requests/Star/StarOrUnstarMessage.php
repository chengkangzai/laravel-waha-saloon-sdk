<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Star;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Star or unstar a message
 */
class StarOrUnstarMessage extends Request implements HasBody
{
    use HasJsonBody;

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
