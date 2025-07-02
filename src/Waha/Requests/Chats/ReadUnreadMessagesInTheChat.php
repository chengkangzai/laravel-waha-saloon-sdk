<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Read unread messages in the chat
 */
class ReadUnreadMessagesInTheChat extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}/messages/read";
    }

    /**
     * @param  null|string  $messages  How much messages to read (latest first)
     * @param  null|string  $days  How much days to read (latest first)
     */
    public function __construct(
        protected string $session,
        protected string $chatId,
        protected ?string $messages = null,
        protected ?string $days = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['messages' => $this->messages, 'days' => $this->days]);
    }
}
