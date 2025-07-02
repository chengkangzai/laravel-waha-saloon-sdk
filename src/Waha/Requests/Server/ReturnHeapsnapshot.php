<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Server;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Return a heapsnapshot
 */
class ReturnHeapsnapshot extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/server/debug/heapsnapshot';
    }

    public function __construct() {}
}
