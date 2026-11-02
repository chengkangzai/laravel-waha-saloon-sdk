<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendSticker;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send a sticker.
 */
class SendSticker extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendSticker';
    }

    public function __construct(
        protected string $chatId,
        protected array $file,
        protected string $session,
        protected ?string $replyTo = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'file' => $this->file,
            'reply_to' => $this->replyTo,
            'session' => $this->session,
        ], fn ($value) => $value !== null);
    }
}
