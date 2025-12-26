<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Demote\DemotesParticipantsToRegularUsers;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Demote extends Resource
{
    public function demotesParticipantsToRegularUsers(string $session, string $id, mixed $participants): Response
    {
        return $this->connector->send(new DemotesParticipantsToRegularUsers($session, $id, $participants));
    }
}
