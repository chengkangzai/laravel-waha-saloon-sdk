<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\PhoneNumbers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List in-memory cache entries.
 */
class ListInMemoryCacheEntries extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/apps/phone-numbers/{$this->session}/cache/memory";
    }

    public function __construct(
        protected string $session,
        protected int|float|null $limit = null,
        protected int|float|null $offset = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'limit' => $this->limit,
            'offset' => $this->offset,
        ], fn ($value) => $value !== null);
    }
}
