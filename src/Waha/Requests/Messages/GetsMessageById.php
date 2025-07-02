<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Gets message by id
 */
class GetsMessageById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/chats/{$this->chatId}/messages/{$this->messageId}";
	}


	/**
	 * @param string $session
	 * @param string $chatId
	 * @param string $messageId
	 * @param null|string $downloadMedia Download media for messages
	 */
	public function __construct(
		protected string $session,
		protected string $chatId,
		protected string $messageId,
		protected ?string $downloadMedia = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['downloadMedia' => $this->downloadMedia]);
	}
}
