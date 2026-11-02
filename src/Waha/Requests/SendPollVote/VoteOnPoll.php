<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendPollVote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Vote on a poll
 */
class VoteOnPoll extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendPollVote';
    }

    /**
     * WAHA requires: $chatId, $pollMessageId, $votes, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $chatId = null,
        protected mixed $pollMessageId = null,
        protected mixed $votes = null,
        protected mixed $session = null,
        protected mixed $pollServerId = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'pollMessageId' => $this->pollMessageId,
            'votes' => $this->votes,
            'session' => $this->session,
            'pollServerId' => $this->pollServerId,
        ], fn ($value) => $value !== null);
    }
}
