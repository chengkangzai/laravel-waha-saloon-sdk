<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Auth;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Request authentication code.
 */
class RequestAuthenticationCode extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/auth/request-code";
	}


	/**
	 * @param string $session
	 * @param null|mixed $phoneNumber
	 * @param null|mixed $method
	 */
	public function __construct(
		protected string $session,
		protected mixed $phoneNumber = null,
		protected mixed $method = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['phoneNumber' => $this->phoneNumber, 'method' => $this->method]);
	}
}
