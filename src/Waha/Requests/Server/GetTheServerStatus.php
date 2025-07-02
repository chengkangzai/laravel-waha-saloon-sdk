<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Server;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the server status
 */
class GetTheServerStatus extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/server/status";
	}


	public function __construct()
	{
	}
}
