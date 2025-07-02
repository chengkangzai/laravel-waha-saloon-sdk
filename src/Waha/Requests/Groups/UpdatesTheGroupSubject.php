<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Updates the group subject
 */
class UpdatesTheGroupSubject extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/groups/{$this->id}/subject";
	}


	/**
	 * @param string $session
	 * @param string $id
	 * @param null|mixed $subject
	 */
	public function __construct(
		protected string $session,
		protected string $id,
		protected mixed $subject = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['subject' => $this->subject]);
	}
}
