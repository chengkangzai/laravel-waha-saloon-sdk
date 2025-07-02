<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * DEPRECATED - you can set "reply_to" field when sending text, image, etc
 */
class DeprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/reply';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $text = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
        protected mixed $linkPreview = null,
        protected mixed $linkPreviewHighQuality = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'text' => $this->text,
            'session' => $this->session,
            'reply_to' => $this->replyTo,
            'linkPreview' => $this->linkPreview,
            'linkPreviewHighQuality' => $this->linkPreviewHighQuality,
        ]);
    }
}
