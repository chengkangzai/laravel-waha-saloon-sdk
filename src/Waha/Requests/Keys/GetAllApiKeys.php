<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get all API keys.
 */
class GetAllApiKeys extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/keys';
    }
}
