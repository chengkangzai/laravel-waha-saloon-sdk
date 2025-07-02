<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get all groups.
 */
class GetAllGroups extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups";
    }

    /**
     * @param  null|string  $sortBy  Sort by field
     * @param  null|string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     * @param  null|string  $exclude  Exclude fields
     * @param  null|string  $exclude  Exclude fields
     */
    public function __construct(
        protected string $session,
        protected ?string $sortBy = null,
        protected ?string $sortOrder = null,
        protected ?string $limit = null,
        protected ?string $offset = null,
        protected ?string $exclude = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'sortBy' => $this->sortBy,
            'sortOrder' => $this->sortOrder,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'exclude' => $this->exclude,
        ]);
    }
}
