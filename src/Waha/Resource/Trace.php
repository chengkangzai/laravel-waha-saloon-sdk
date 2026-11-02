<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Trace\CollectAndGetTraceJsonForChromeDevTools;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Trace extends Resource
{
    /**
     * @param  string|int|float|null  $seconds  How many seconds to trace
     * @param  string|array|null  $categories  Categories to trace (all by default)
     */
    public function collectAndGetTraceJsonForChromeDevTools(
        string $session,
        string|int|float|null $seconds = null,
        string|array|null $categories = null,
    ): Response {
        return $this->connector->send(new CollectAndGetTraceJsonForChromeDevTools($session, $seconds, $categories));
    }
}
