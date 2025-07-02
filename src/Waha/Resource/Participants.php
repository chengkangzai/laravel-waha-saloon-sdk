<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Participants\AddParticipants;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Participants\GetParticipants;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Participants\RemoveParticipants;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Participants extends Resource
{
    public function getParticipants(string $session, string $id): Response
    {
        return $this->connector->send(new GetParticipants($session, $id));
    }

    public function addParticipants(string $session, string $id, mixed $participants): Response
    {
        return $this->connector->send(new AddParticipants($session, $id, $participants));
    }

    public function removeParticipants(string $session, string $id, mixed $participants): Response
    {
        return $this->connector->send(new RemoveParticipants($session, $id, $participants));
    }
}
