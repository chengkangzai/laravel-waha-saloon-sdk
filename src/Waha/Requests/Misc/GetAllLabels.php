<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get all labels
 */
class GetAllLabels extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/labels";
	}


	/**
	 * @param string $session
	 */
	public function __construct(
		protected string $session,
	) {
	}
}
