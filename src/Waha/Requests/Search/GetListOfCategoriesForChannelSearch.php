<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Search;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get list of categories for channel search
 */
class GetListOfCategoriesForChannelSearch extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/channels/search/categories";
	}


	/**
	 * @param string $session
	 */
	public function __construct(
		protected string $session,
	) {
	}
}
