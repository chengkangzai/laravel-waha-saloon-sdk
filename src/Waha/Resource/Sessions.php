<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\DeleteTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetSessionInformation;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\UpdateSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Sessions extends Resource
{
    /**
     * @param  string  $expand  Expand additional session details.
     * @param  string  $expand  Expand additional session details.
     */
    public function getSessionInformation(string $session, ?string $expand): Response
    {
        return $this->connector->send(new GetSessionInformation($session, $expand, $expand));
    }

    public function updateSession(string $session, mixed $name): Response
    {
        return $this->connector->send(new UpdateSession($session, $name));
    }

    public function deleteTheSession(string $session): Response
    {
        return $this->connector->send(new DeleteTheSession($session));
    }
}
