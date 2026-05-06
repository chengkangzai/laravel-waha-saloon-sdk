<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\DeleteTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetSessionInformation;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\UpdateSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

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

    public function updateSession(string $session, mixed $name = null, mixed $config = null): Response
    {
        return $this->connector->send(new UpdateSession($session, $name, $config)); // @phpstan-ignore-line
    }

    public function deleteTheSession(string $session): Response
    {
        return $this->connector->send(new DeleteTheSession($session));
    }
}
