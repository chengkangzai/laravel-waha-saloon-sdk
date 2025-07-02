<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get session information
 */
class GetSessionInformation extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/sessions/{$this->session}";
	}


	/**
	 * @param string $session
	 */
	public function __construct(
		protected string $session,
	) {
	}
}
