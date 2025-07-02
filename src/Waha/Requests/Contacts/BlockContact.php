<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Block contact
 */
class BlockContact extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/contacts/block";
	}


	/**
	 * @param null|mixed $contactId
	 * @param null|mixed $session
	 */
	public function __construct(
		protected mixed $contactId = null,
		protected mixed $session = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['contactId' => $this->contactId, 'session' => $this->session]);
	}
}
