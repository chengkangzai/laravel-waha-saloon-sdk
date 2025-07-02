<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Profile;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Set profile status (About)
 */
class SetProfileStatusAbout extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/profile/status";
	}


	/**
	 * @param string $session
	 * @param null|mixed $status
	 */
	public function __construct(
		protected string $session,
		protected mixed $status = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['status' => $this->status]);
	}
}
