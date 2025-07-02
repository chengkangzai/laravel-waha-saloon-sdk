<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send a video
 */
class SendVideo extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/sendVideo";
	}


	/**
	 * @param null|mixed $chatId
	 * @param null|mixed $file
	 * @param null|mixed $session
	 * @param null|mixed $replyTo
	 * @param null|mixed $asNote
	 * @param null|mixed $caption
	 */
	public function __construct(
		protected mixed $chatId = null,
		protected mixed $file = null,
		protected mixed $session = null,
		protected mixed $replyTo = null,
		protected mixed $asNote = null,
		protected mixed $caption = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'chatId' => $this->chatId,
			'file' => $this->file,
			'session' => $this->session,
			'reply_to' => $this->replyTo,
			'asNote' => $this->asNote,
			'caption' => $this->caption,
		]);
	}
}
