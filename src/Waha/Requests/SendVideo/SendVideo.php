<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendVideo;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send a video
 */
class SendVideo extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendVideo';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $file = null,
        protected mixed $convert = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
        protected mixed $asNote = null,
        protected mixed $caption = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'file' => $this->file,
            'convert' => $this->convert,
            'session' => $this->session,
            'reply_to' => $this->replyTo,
            'asNote' => $this->asNote,
            'caption' => $this->caption,
        ]);
    }
}
