<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Start\StartTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Start\UpsertAndStartSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Start extends Resource
{
    public function startTheSession(string $session): Response
    {
        return $this->connector->send(new StartTheSession($session));
    }

    public function upsertAndStartSession(mixed $name, mixed $config): Response
    {
        return $this->connector->send(new UpsertAndStartSession($name, $config));
    }
}
