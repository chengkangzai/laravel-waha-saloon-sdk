<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Mute the channel.
 */
class MuteTheChannel extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/channels/{$this->id}/mute";
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
