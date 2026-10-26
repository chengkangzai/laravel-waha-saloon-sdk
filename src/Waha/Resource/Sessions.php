<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\DeleteTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetSessionCapping;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetSessionInformation;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetSessionTimelock;
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

    /**
     * Whether WhatsApp has barred the session from starting chats with new contacts
     * (error 463), and until when: `enforcementType`, `isActive`, `timeEnforcementEnds`.
     */
    public function getSessionTimelock(string $session): Response
    {
        return $this->connector->send(new GetSessionTimelock($session));
    }

    /**
     * The session's monthly quota of messages to contacts it has no chat with:
     * `cappingStatus`, `totalQuota`, `usedQuota`, `cycleStart`, `cycleEnd`.
     */
    public function getSessionCapping(string $session): Response
    {
        return $this->connector->send(new GetSessionCapping($session));
    }

    public function updateSession(string $session, mixed $name = null, mixed $config = null): Response
    {
        return $this->connector->send(new UpdateSession($session, $name, $config));
    }

    public function deleteTheSession(string $session): Response
    {
        return $this->connector->send(new DeleteTheSession($session));
    }
}
