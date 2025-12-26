<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Add\AddParticipants;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Add extends Resource
{
    public function addParticipants(string $session, string $id, mixed $participants): Response
    {
        return $this->connector->send(new AddParticipants($session, $id, $participants));
    }
}
