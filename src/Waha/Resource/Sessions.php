<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\DeleteTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetInformationAboutTheAuthenticatedAccount;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetSessionInformation;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\LogoutFromTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\RestartTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\StartTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\StopTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\UpdateSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Sessions extends Resource
{
    public function getSessionInformation(string $session): Response
    {
        return $this->connector->send(new GetSessionInformation($session));
    }

    public function updateSession(string $session, mixed $config): Response
    {
        return $this->connector->send(new UpdateSession($session, $config));
    }

    public function deleteTheSession(string $session): Response
    {
        return $this->connector->send(new DeleteTheSession($session));
    }

    public function getInformationAboutTheAuthenticatedAccount(string $session): Response
    {
        return $this->connector->send(new GetInformationAboutTheAuthenticatedAccount($session));
    }

    public function startTheSession(string $session): Response
    {
        return $this->connector->send(new StartTheSession($session));
    }

    public function stopTheSession(string $session): Response
    {
        return $this->connector->send(new StopTheSession($session));
    }

    public function logoutFromTheSession(string $session): Response
    {
        return $this->connector->send(new LogoutFromTheSession($session));
    }

    public function restartTheSession(string $session): Response
    {
        return $this->connector->send(new RestartTheSession($session));
    }
}
