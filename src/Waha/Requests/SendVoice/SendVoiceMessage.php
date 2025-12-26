<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendVoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send an voice message
 */
class SendVoiceMessage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendVoice';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $file = null,
        protected mixed $convert = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'file' => $this->file,
            'convert' => $this->convert,
            'session' => $this->session,
            'reply_to' => $this->replyTo,
        ]);
    }
}
