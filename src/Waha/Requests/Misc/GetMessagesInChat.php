<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get messages in a chat
 *
 * @deprecated Use Chats\GetsMessagesInTheChat.
 */
class GetMessagesInChat extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/messages';
    }

    /**
     * WAHA requires: $chatId, $session, $limit. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     *
     * @param  string|bool|null  $downloadMedia  Download media for messages
     * @param  null|string  $chatId  (Required)
     * @param  null|string  $session  (Required)
     * @param  string|int|float|null  $limit  (Required)
     * @param  string|int|float|null  $filterTimestampLte  Filter messages before this timestamp (inclusive)
     * @param  string|int|float|null  $filterTimestampGte  Filter messages after this timestamp (inclusive)
     * @param  string|bool|null  $filterFromMe  From me filter (by default shows all messages)
     * @param  null|string  $filterAck  Filter messages by acknowledgment status
     */
    public function __construct(
        protected string|bool|null $downloadMedia = null,
        protected ?string $chatId = null,
        protected ?string $session = null,
        protected string|int|float|null $limit = null,
        protected string|int|float|null $offset = null,
        protected string|int|float|null $filterTimestampLte = null,
        protected string|int|float|null $filterTimestampGte = null,
        protected string|bool|null $filterFromMe = null,
        protected ?string $filterAck = null,
        protected ?string $sortBy = null,
        protected ?string $sortOrder = null,
        protected ?array $downloadMediaMimetypes = null,
        protected ?bool $merge = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'downloadMedia' => $this->downloadMedia,
            'chatId' => $this->chatId,
            'session' => $this->session,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'filter.timestamp.lte' => $this->filterTimestampLte,
            'filter.timestamp.gte' => $this->filterTimestampGte,
            'filter.fromMe' => $this->filterFromMe,
            'filter.ack' => $this->filterAck,
            'sortBy' => $this->sortBy,
            'sortOrder' => $this->sortOrder,
            'downloadMediaMimetypes' => $this->downloadMediaMimetypes,
            'merge' => $this->merge,
        ], fn ($value) => $value !== null);
    }
}
