<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Mute\MuteTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Mute extends Resource
{
    public function muteTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new MuteTheChannel($session, $id));
    }
}
