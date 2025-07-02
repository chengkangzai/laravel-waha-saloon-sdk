<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Send;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Reply on a button message
 */
class ReplyOnButtonMessage extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/send/buttons/reply";
	}


	/**
	 * @param null|mixed $chatId
	 * @param null|mixed $selectedDisplayText
	 * @param null|mixed $selectedButtonId
	 * @param null|mixed $session
	 * @param null|mixed $replyTo
	 */
	public function __construct(
		protected mixed $chatId = null,
		protected mixed $selectedDisplayText = null,
		protected mixed $selectedButtonId = null,
		protected mixed $session = null,
		protected mixed $replyTo = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'chatId' => $this->chatId,
			'selectedDisplayText' => $this->selectedDisplayText,
			'selectedButtonID' => $this->selectedButtonId,
			'session' => $this->session,
			'replyTo' => $this->replyTo,
		]);
	}
}
