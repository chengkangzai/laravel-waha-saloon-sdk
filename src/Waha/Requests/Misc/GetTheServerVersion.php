<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the server version
 */
class GetTheServerVersion extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/version";
	}


	public function __construct()
	{
	}
}
