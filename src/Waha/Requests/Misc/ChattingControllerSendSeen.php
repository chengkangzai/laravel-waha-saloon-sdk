<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Chatting Controller send Seen
 */
class ChattingControllerSendSeen extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendSeen';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $session = null,
        protected mixed $messageId = null,
        protected mixed $messageIds = null,
        protected mixed $participant = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'session' => $this->session,
            'messageId' => $this->messageId,
            'messageIds' => $this->messageIds,
            'participant' => $this->participant,
        ]);
    }
}
