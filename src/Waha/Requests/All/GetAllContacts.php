<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\All;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get all contacts
 */
class GetAllContacts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/contacts/all';
    }

    /**
     * @param  null|string  $sortBy  Sort by field
     * @param  null|string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     */
    public function __construct(
        protected ?string $session = null,
        protected ?string $sortBy = null,
        protected ?string $sortOrder = null,
        protected ?string $limit = null,
        protected ?string $offset = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'session' => $this->session,
            'sortBy' => $this->sortBy,
            'sortOrder' => $this->sortOrder,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
