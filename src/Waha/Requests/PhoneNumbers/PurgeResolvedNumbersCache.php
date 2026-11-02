<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\PhoneNumbers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Purge the resolved-numbers cache.
 */
class PurgeResolvedNumbersCache extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/api/apps/phone-numbers/{$this->session}/cache/purge";
    }

    public function __construct(
        protected string $session,
    ) {}
}
