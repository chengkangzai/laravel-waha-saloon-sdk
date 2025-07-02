<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send a poll with options
 */
class SendPollWithOptions extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/sendPoll";
	}


	/**
	 * @param null|mixed $chatId
	 * @param null|mixed $poll
	 * @param null|mixed $session
	 * @param null|mixed $replyTo
	 */
	public function __construct(
		protected mixed $chatId = null,
		protected mixed $poll = null,
		protected mixed $session = null,
		protected mixed $replyTo = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['chatId' => $this->chatId, 'poll' => $this->poll, 'session' => $this->session, 'reply_to' => $this->replyTo]);
	}
}
