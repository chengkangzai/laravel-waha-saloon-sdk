<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Logout\LogoutAndDeleteSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Logout\LogoutFromTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Logout extends Resource
{
    public function logoutFromTheSession(string $session, ?array $apps = null): Response
    {
        return $this->connector->send(new LogoutFromTheSession($session, $apps));
    }

    /**
     * @deprecated Use Logout\LogoutFromTheSession and Sessions\DeleteTheSession.
     */
    public function logoutAndDeleteSession(mixed $name = null): Response
    {
        return $this->connector->send(new LogoutAndDeleteSession($name));
    }
}
