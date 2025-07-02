<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Set profile picture
 */
class SetProfilePicture extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/profile/picture";
	}


	/**
	 * @param string $session
	 * @param null|mixed $file
	 */
	public function __construct(
		protected string $session,
		protected mixed $file = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['file' => $this->file]);
	}
}
