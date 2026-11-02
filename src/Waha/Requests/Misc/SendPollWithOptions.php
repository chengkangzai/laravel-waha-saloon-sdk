<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send a poll with options
 */
class SendPollWithOptions extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendPoll';
    }

    /**
     * WAHA requires: $chatId, $poll, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $chatId = null,
        protected mixed $poll = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
        protected ?string $id = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'poll' => $this->poll,
            'session' => $this->session,
            'reply_to' => $this->replyTo,
            'id' => $this->id,
        ], fn ($value) => $value !== null);
    }
}
