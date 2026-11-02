<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send a file
 */
class SendFile extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendFile';
    }

    /**
     * WAHA requires: $chatId, $file, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $chatId = null,
        protected mixed $file = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
        protected mixed $caption = null,
        protected ?array $mentions = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'file' => $this->file,
            'session' => $this->session,
            'reply_to' => $this->replyTo,
            'caption' => $this->caption,
            'mentions' => $this->mentions,
        ], fn ($value) => $value !== null);
    }
}
