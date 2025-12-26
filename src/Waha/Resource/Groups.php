<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups\DeleteTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups\GetTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Groups extends Resource
{
    public function getTheGroup(string $session, string $id): Response
    {
        return $this->connector->send(new GetTheGroup($session, $id));
    }

    public function deleteTheGroup(string $session, string $id): Response
    {
        return $this->connector->send(new DeleteTheGroup($session, $id));
    }
}
