<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Status;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send image status
 */
class SendImageStatus extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/status/image";
	}


	/**
	 * @param string $session
	 * @param null|mixed $file
	 * @param null|mixed $id
	 * @param null|mixed $contacts
	 * @param null|mixed $caption
	 */
	public function __construct(
		protected string $session,
		protected mixed $file = null,
		protected mixed $id = null,
		protected mixed $contacts = null,
		protected mixed $caption = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['file' => $this->file, 'id' => $this->id, 'contacts' => $this->contacts, 'caption' => $this->caption]);
	}
}
