<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

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

    /**
     * WAHA requires: $chatId, $file, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $chatId = null,
        protected mixed $file = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
        protected mixed $asNote = null,
        protected mixed $caption = null,
        protected ?array $mentions = null,
        protected ?bool $convert = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'file' => $this->file,
            'session' => $this->session,
            'reply_to' => $this->replyTo,
            'asNote' => $this->asNote,
            'caption' => $this->caption,
            'mentions' => $this->mentions,
            'convert' => $this->convert,
        ], fn ($value) => $value !== null);
    }
}
