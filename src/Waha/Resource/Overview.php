<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Overview\GetChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Overview\GetChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Overview extends Resource
{
    /**
     * @param  string  $ids  Filter by chat ids
     */
    public function getChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp(
        string $session,
        ?string $limit,
        ?string $offset,
        ?string $ids,
    ): Response {
        return $this->connector->send(new GetChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp($session, $limit, $offset, $ids));
    }

    public function getChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt(
        string $session,
        mixed $pagination,
        mixed $filter,
    ): Response {
        return $this->connector->send(new GetChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt($session, $pagination, $filter));
    }
}
