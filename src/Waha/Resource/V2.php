<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\V2\GetGroupParticipants;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class V2 extends Resource
{
    public function getGroupParticipants(string $session, string $id): Response
    {
        return $this->connector->send(new GetGroupParticipants($session, $id));
    }
}
