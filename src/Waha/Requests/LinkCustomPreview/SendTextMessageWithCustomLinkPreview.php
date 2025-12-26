<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\LinkCustomPreview;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send a text message with a CUSTOM link preview.
 */
class SendTextMessageWithCustomLinkPreview extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/send/link-custom-preview';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $text = null,
        protected mixed $preview = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
        protected mixed $linkPreviewHighQuality = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'text' => $this->text,
            'preview' => $this->preview,
            'session' => $this->session,
            'reply_to' => $this->replyTo,
            'linkPreviewHighQuality' => $this->linkPreviewHighQuality,
        ]);
    }
}
