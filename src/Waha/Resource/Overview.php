<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Overview\GetChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Overview\GetChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Overview extends Resource
{
	/**
	 * @param string $session
	 * @param string $limit
	 * @param string $offset
	 * @param string $ids Filter by chat ids
	 */
	public function getChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp(
		string $session,
		?string $limit,
		?string $offset,
		?string $ids,
	): Response
	{
		return $this->connector->send(new GetChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp($session, $limit, $offset, $ids));
	}


	/**
	 * @param string $session
	 * @param mixed $pagination
	 * @param mixed $filter
	 */
	public function getChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt(
		string $session,
		mixed $pagination,
		mixed $filter,
	): Response
	{
		return $this->connector->send(new GetChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt($session, $pagination, $filter));
	}
}
