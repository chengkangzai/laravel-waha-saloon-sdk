<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Lids;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get all known lids to phone number mapping
 */
class GetAllKnownLidsToPhoneNumberMapping extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/lids";
	}


	/**
	 * @param string $session
	 * @param null|string $limit
	 * @param null|string $offset
	 */
	public function __construct(
		protected string $session,
		protected ?string $limit = null,
		protected ?string $offset = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['limit' => $this->limit, 'offset' => $this->offset]);
	}
}
