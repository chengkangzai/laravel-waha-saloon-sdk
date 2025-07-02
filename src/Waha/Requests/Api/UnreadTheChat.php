<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Api;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Unread the chat
 */
class UnreadTheChat extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/chats/{$this->chatId}/unread";
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
