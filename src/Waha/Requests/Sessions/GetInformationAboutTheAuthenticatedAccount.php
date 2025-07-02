<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get information about the authenticated account
 */
class GetInformationAboutTheAuthenticatedAccount extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/sessions/{$this->session}/me";
	}


	/**
	 * @param string $session
	 */
	public function __construct(
		protected string $session,
	) {
	}
}
