<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Status;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the server status
 */
class GetTheServerStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/server/status';
    }

    public function __construct() {}
}
