<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Presence;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the presence for the chat id. If it hasn't been subscribed - it also subscribes to it.
 */
class GetThePresenceForTheChatIdIfItHasntBeenSubscribedItAlsoSubscribesToIt extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/presence/{$this->chatId}";
	}


	/**
	 * @param string $session
	 * @param string $chatId
	 */
	public function __construct(
		protected string $session,
		protected string $chatId,
	) {
	}
}
