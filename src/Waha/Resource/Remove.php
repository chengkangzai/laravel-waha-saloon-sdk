<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Remove\RemoveParticipants;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Remove extends Resource
{
    public function removeParticipants(string $session, string $id, mixed $participants): Response
    {
        return $this->connector->send(new RemoveParticipants($session, $id, $participants));
    }
}
