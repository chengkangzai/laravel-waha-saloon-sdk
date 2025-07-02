<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Search;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get list of countries for channel search
 */
class GetListOfCountriesForChannelSearch extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/channels/search/countries";
	}


	/**
	 * @param string $session
	 */
	public function __construct(
		protected string $session,
	) {
	}
}
