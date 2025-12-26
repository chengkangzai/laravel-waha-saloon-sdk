<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Promote\PromoteParticipantsToAdminUsers;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Promote extends Resource
{
    public function promoteParticipantsToAdminUsers(string $session, string $id, mixed $participants): Response
    {
        return $this->connector->send(new PromoteParticipantsToAdminUsers($session, $id, $participants));
    }
}
