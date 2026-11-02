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

    /**
     * @deprecated Use Misc\CreateSession and Start\StartTheSession.
     */
    public function upsertAndStartSession(mixed $name = null, mixed $config = null): Response
    {
        return $this->connector->send(new UpsertAndStartSession($name, $config));
    }
}
