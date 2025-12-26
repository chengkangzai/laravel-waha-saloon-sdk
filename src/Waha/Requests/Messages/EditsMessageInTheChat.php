<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Edits a message in the chat
 */
class EditsMessageInTheChat extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}/messages/{$this->messageId}";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
        protected string $messageId,
        protected mixed $text = null,
        protected mixed $linkPreview = null,
        protected mixed $linkPreviewHighQuality = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['text' => $this->text, 'linkPreview' => $this->linkPreview, 'linkPreviewHighQuality' => $this->linkPreviewHighQuality]);
    }
}
