<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Server;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the server environment
 */
class GetTheServerEnvironment extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/server/environment";
	}


	/**
	 * @param null|string $all Include all environment variables
	 */
	public function __construct(
		protected ?string $all = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['all' => $this->all]);
	}
}
