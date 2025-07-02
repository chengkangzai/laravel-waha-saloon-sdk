<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get group picture
 */
class GetGroupPicture extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/groups/{$this->id}/picture";
	}


	/**
	 * @param string $session
	 * @param string $id
	 * @param null|string $refresh Refresh the picture from the server (24h cache by default). Do not refresh if not needed, you can get rate limit error
	 */
	public function __construct(
		protected string $session,
		protected string $id,
		protected ?string $refresh = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['refresh' => $this->refresh]);
	}
}
