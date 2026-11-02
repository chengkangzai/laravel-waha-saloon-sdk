<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Overview\GetChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Overview\GetChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Overview extends Resource
{
    /**
     * @param  string|array|null  $ids  Filter by chat ids
     */
    public function getChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp(
        string $session,
        string|int|float|null $limit = null,
        string|int|float|null $offset = null,
        string|array|null $ids = null,
        ?bool $merge = null,
    ): Response {
        return $this->connector->send(new GetChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp($session, $limit, $offset, $ids, $merge));
    }

    public function getChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt(
        string $session,
        mixed $pagination = null,
        mixed $filter = null,
    ): Response {
        return $this->connector->send(new GetChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt($session, $pagination, $filter));
    }
}
