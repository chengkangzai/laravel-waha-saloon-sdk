<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Gets messages in the chat
 */
class GetsMessagesInTheChat extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}/messages";
    }

    /**
     * @param  null|string  $sortBy  Sort by field
     * @param  null|string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     * @param  null|string  $downloadMedia  Download media for messages
     * @param  null|string  $filterTimestampLte  Filter messages before this timestamp (inclusive)
     * @param  null|string  $filterTimestampGte  Filter messages after this timestamp (inclusive)
     * @param  null|string  $filterFromMe  From me filter (by default shows all messages)
     * @param  null|string  $filterAck  Filter messages by acknowledgment status
     */
    public function __construct(
        protected string $session,
        protected string $chatId,
        protected ?string $sortBy = null,
        protected ?string $sortOrder = null,
        protected ?string $downloadMedia = null,
        protected ?string $limit = null,
        protected ?string $offset = null,
        protected ?string $filterTimestampLte = null,
        protected ?string $filterTimestampGte = null,
        protected ?string $filterFromMe = null,
        protected ?string $filterAck = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'sortBy' => $this->sortBy,
            'sortOrder' => $this->sortOrder,
            'downloadMedia' => $this->downloadMedia,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'filter.timestamp.lte' => $this->filterTimestampLte,
            'filter.timestamp.gte' => $this->filterTimestampGte,
            'filter.fromMe' => $this->filterFromMe,
            'filter.ack' => $this->filterAck,
        ]);
    }
}
