<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels\DeleteTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels\GetTheChannelInfo;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Channels extends Resource
{
    public function deleteTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new DeleteTheChannel($session, $id));
    }

    public function getTheChannelInfo(string $session, string $id): Response
    {
        return $this->connector->send(new GetTheChannelInfo($session, $id));
    }
}
