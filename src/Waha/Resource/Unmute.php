<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Unmute\UnmuteTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Unmute extends Resource
{
    public function unmuteTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new UnmuteTheChannel($session, $id));
    }
}
