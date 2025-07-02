<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Overview;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Get chats overview. Use POST if you have too many "ids" params - GET can limit it
 */
class GetChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/chats/overview";
	}


	/**
	 * @param string $session
	 * @param null|mixed $pagination
	 * @param null|mixed $filter
	 */
	public function __construct(
		protected string $session,
		protected mixed $pagination = null,
		protected mixed $filter = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['pagination' => $this->pagination, 'filter' => $this->filter]);
	}
}
