<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Heapsnapshot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Return a heapsnapshot for the current nodejs process
 */
class ReturnHeapsnapshotForTheCurrentNodejsProcess extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/server/debug/heapsnapshot';
    }

    public function __construct() {}
}
