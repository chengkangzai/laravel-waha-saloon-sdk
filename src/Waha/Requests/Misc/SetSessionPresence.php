<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Set session presence
 */
class SetSessionPresence extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/presence";
	}


	/**
	 * @param string $session
	 * @param null|mixed $chatId
	 * @param null|mixed $presence
	 */
	public function __construct(
		protected string $session,
		protected mixed $chatId = null,
		protected mixed $presence = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['chatId' => $this->chatId, 'presence' => $this->presence]);
	}
}
