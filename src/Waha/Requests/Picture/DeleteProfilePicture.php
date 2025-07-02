<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete profile picture
 */
class DeleteProfilePicture extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/profile/picture";
	}


	/**
	 * @param string $session
	 */
	public function __construct(
		protected string $session,
	) {
	}
}
