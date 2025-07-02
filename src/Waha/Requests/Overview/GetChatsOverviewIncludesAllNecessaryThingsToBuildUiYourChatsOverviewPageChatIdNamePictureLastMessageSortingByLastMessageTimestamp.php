<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Overview;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get chats overview. Includes all necessary things to build UI "your chats overview" page - chat id, name, picture, last message. Sorting by last message timestamp
 */
class GetChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/overview";
    }

    /**
     * @param  null|string  $ids  Filter by chat ids
     */
    public function __construct(
        protected string $session,
        protected ?string $limit = null,
        protected ?string $offset = null,
        protected ?string $ids = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit, 'offset' => $this->offset, 'ids' => $this->ids]);
    }
}
