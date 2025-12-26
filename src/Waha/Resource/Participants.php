<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Participants\GetParticipants;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Participants extends Resource
{
    public function getParticipants(string $session, string $id): Response
    {
        return $this->connector->send(new GetParticipants($session, $id));
    }
}
