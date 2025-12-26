<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Ping\PingTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Ping extends Resource
{
    public function pingTheServer(): Response
    {
        return $this->connector->send(new PingTheServer);
    }
}
