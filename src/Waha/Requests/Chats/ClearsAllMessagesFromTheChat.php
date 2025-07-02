<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Clears all messages from the chat
 */
class ClearsAllMessagesFromTheChat extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/chats/{$this->chatId}/messages";
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
