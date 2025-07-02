<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Logout and Delete session.
 */
class LogoutAndDeleteSession extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/sessions/logout";
	}


	/**
	 * @param null|mixed $name
	 */
	public function __construct(
		protected mixed $name = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['name' => $this->name]);
	}
}
