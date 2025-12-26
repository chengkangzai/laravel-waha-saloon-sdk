<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Restart\RestartTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Restart extends Resource
{
    public function restartTheSession(string $session): Response
    {
        return $this->connector->send(new RestartTheSession($session));
    }
}
