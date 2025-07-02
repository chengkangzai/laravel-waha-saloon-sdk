<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Chatting Controller start Typing
 */
class ChattingControllerStartTyping extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/startTyping";
	}


	/**
	 * @param null|mixed $chatId
	 * @param null|mixed $session
	 */
	public function __construct(
		protected mixed $chatId = null,
		protected mixed $session = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['chatId' => $this->chatId, 'session' => $this->session]);
	}
}
