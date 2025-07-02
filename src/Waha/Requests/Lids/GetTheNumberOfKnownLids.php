<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Lids;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the number of known lids
 */
class GetTheNumberOfKnownLids extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/lids/count";
    }

    public function __construct(
        protected string $session,
    ) {}
}
