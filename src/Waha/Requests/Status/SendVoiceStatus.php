<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Status;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send voice status
 */
class SendVoiceStatus extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/status/voice";
	}


	/**
	 * @param string $session
	 * @param null|mixed $file
	 * @param null|mixed $backgroundColor
	 * @param null|mixed $id
	 * @param null|mixed $contacts
	 */
	public function __construct(
		protected string $session,
		protected mixed $file = null,
		protected mixed $backgroundColor = null,
		protected mixed $id = null,
		protected mixed $contacts = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['file' => $this->file, 'backgroundColor' => $this->backgroundColor, 'id' => $this->id, 'contacts' => $this->contacts]);
	}
}
