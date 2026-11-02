<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Gets message by id
 */
class GetsMessageById extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}/messages/{$this->messageId}";
    }

    /**
     * @param  string|bool|null  $downloadMedia  Download media for messages
     */
    public function __construct(
        protected string $session,
        protected string $chatId,
        protected string $messageId,
        protected string|bool|null $downloadMedia = null,
        protected ?array $downloadMediaMimetypes = null,
        protected ?bool $merge = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'downloadMedia' => $this->downloadMedia,
            'downloadMediaMimetypes' => $this->downloadMediaMimetypes,
            'merge' => $this->merge,
        ], fn ($value) => $value !== null);
    }
}
