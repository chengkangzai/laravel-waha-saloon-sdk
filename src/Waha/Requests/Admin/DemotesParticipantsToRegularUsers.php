<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Admin;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Demotes participants to regular users.
 */
class DemotesParticipantsToRegularUsers extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/groups/{$this->id}/admin/demote";
	}


	/**
	 * @param string $session
	 * @param string $id
	 * @param null|mixed $participants
	 */
	public function __construct(
		protected string $session,
		protected string $id,
		protected mixed $participants = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['participants' => $this->participants]);
	}
}
