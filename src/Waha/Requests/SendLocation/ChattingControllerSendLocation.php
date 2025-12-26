<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendLocation;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Chatting Controller send Location
 */
class ChattingControllerSendLocation extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendLocation';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $latitude = null,
        protected mixed $longitude = null,
        protected mixed $title = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'session' => $this->session,
            'reply_to' => $this->replyTo,
        ]);
    }
}
