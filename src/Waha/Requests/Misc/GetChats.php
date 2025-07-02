<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get chats
 */
class GetChats extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/{$this->session}/chats";
	}


	/**
	 * @param string $session
	 * @param null|string $sortBy Sort by field
	 * @param null|string $sortOrder Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
	 * @param null|string $limit
	 * @param null|string $offset
	 */
	public function __construct(
		protected string $session,
		protected ?string $sortBy = null,
		protected ?string $sortOrder = null,
		protected ?string $limit = null,
		protected ?string $offset = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['sortBy' => $this->sortBy, 'sortOrder' => $this->sortOrder, 'limit' => $this->limit, 'offset' => $this->offset]);
	}
}
