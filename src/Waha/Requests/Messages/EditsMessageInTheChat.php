<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Edits a message in the chat
 */
class EditsMessageInTheChat extends Request
{
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
