<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete group picture
 */
class DeleteGroupPicture extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/groups/{$this->id}/picture";
	}


	/**
	 * @param string $session
	 * @param string $id
	 */
	public function __construct(
		protected string $session,
		protected string $id,
	) {
	}
}
