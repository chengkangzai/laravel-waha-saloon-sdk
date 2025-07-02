<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all sessions
 */
class ListAllSessions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/sessions";
	}


	/**
	 * @param null|string $all Return all sessions, including those that are in the STOPPED state.
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
