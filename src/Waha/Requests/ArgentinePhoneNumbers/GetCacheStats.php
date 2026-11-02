<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\ArgentinePhoneNumbers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get cache stats.
 */
class GetCacheStats extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/apps/argentine-phone-numbers/{$this->session}/cache/stats";
    }

    public function __construct(
        protected string $session,
    ) {}
}
