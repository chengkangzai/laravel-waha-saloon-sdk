<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Version\GetTheServerVersion;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Version\GetTheVersionOfTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Version extends Resource
{
    public function getTheVersionOfTheServer(): Response
    {
        return $this->connector->send(new GetTheVersionOfTheServer);
    }

    public function getTheServerVersion(): Response
    {
        return $this->connector->send(new GetTheServerVersion);
    }
}
