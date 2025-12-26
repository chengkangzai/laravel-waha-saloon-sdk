<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Health\CheckTheHealthOfTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Health extends Resource
{
    public function checkTheHealthOfTheServer(): Response
    {
        return $this->connector->send(new CheckTheHealthOfTheServer);
    }
}
