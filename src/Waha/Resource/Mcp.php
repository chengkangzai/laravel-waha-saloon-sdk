<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Mcp\SendMcpRequest;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Mcp extends Resource
{
    /**
     * @param  array<string, mixed>  $payload  JSON protocol payload.
     */
    public function sendMcpRequest(
        array $payload = [],
    ): Response {
        return $this->connector->send(new SendMcpRequest($payload));
    }
}
