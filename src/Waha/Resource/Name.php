<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Name\SetMyProfileName;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Name extends Resource
{
    public function setMyProfileName(string $session, mixed $name): Response
    {
        return $this->connector->send(new SetMyProfileName($session, $name));
    }
}
