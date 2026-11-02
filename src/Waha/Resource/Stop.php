<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Stop\StopAndLogoutIfAskedSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Stop\StopAndRestartTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Stop\StopTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Stop extends Resource
{
    public function stopTheSession(string $session): Response
    {
        return $this->connector->send(new StopTheSession($session));
    }

    /**
     * @deprecated Use Stop\StopTheSession and Logout\LogoutFromTheSession.
     */
    public function stopAndLogoutIfAskedSession(mixed $name = null, mixed $logout = null): Response
    {
        return $this->connector->send(new StopAndLogoutIfAskedSession($name, $logout));
    }

    public function stopAndRestartTheServer(mixed $force = null): Response
    {
        return $this->connector->send(new StopAndRestartTheServer($force));
    }
}
