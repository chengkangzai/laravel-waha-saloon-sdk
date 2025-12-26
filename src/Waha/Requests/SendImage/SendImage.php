<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendImage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send an image
 */
class SendImage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendImage';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $file = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
        protected mixed $caption = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'file' => $this->file,
            'session' => $this->session,
            'reply_to' => $this->replyTo,
            'caption' => $this->caption,
        ]);
    }
}
