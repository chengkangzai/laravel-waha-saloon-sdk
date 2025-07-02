<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Search;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get list of views for channel search
 */
class GetListOfViewsForChannelSearch extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/channels/search/views";
	}


	/**
	 * @param string $session
	 */
	public function __construct(
		protected string $session,
	) {
	}
}
