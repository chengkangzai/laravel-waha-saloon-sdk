<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Logout\LogoutAndDeleteSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Logout\LogoutFromTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Logout extends Resource
{
    public function logoutFromTheSession(string $session): Response
    {
        return $this->connector->send(new LogoutFromTheSession($session));
    }

    public function logoutAndDeleteSession(mixed $name): Response
    {
        return $this->connector->send(new LogoutAndDeleteSession($name));
    }
}
