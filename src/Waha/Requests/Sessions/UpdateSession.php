<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update a session
 */
class UpdateSession extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/api/sessions/{$this->session}";
	}


	/**
	 * @param string $session
	 * @param null|mixed $config
	 */
	public function __construct(
		protected string $session,
		protected mixed $config = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['config' => $this->config]);
	}
}
