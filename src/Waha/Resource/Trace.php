<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Trace\CollectAndGetTraceJsonForChromeDevTools;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Trace extends Resource
{
    /**
     * @param  string  $seconds  How many seconds to trace
     * @param  string  $categories  Categories to trace (all by default)
     */
    public function collectAndGetTraceJsonForChromeDevTools(
        string $session,
        ?string $seconds,
        ?string $categories,
    ): Response {
        return $this->connector->send(new CollectAndGetTraceJsonForChromeDevTools($session, $seconds, $categories));
    }
}
