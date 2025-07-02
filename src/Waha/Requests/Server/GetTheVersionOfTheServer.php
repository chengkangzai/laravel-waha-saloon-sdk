<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Server;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the version of the server
 */
class GetTheVersionOfTheServer extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/server/version';
    }

    public function __construct() {}
}
