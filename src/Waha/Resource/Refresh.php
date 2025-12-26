<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Refresh\RefreshGroupsFromTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Refresh extends Resource
{
    public function refreshGroupsFromTheServer(string $session): Response
    {
        return $this->connector->send(new RefreshGroupsFromTheServer($session));
    }
}
