<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Unfollow the channel.
 */
class UnfollowTheChannel extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/channels/{$this->id}/unfollow";
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
