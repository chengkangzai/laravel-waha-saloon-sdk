<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get all known lids to phone number mapping
 */
class GetAllKnownLidsToPhoneNumberMapping extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/lids";
    }

    public function __construct(
        protected string $session,
        protected ?string $limit = null,
        protected ?string $offset = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit, 'offset' => $this->offset]);
    }
}
