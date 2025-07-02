<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Server;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Stop (and restart) the server
 */
class StopAndRestartTheServer extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/server/stop";
	}


	/**
	 * @param null|mixed $force
	 */
	public function __construct(
		protected mixed $force = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['force' => $this->force]);
	}
}
