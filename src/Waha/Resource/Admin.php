<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Admin\DemotesParticipantsToRegularUsers;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Admin\PromoteParticipantsToAdminUsers;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Admin extends Resource
{
    public function promoteParticipantsToAdminUsers(string $session, string $id, mixed $participants): Response
    {
        return $this->connector->send(new PromoteParticipantsToAdminUsers($session, $id, $participants));
    }

    public function demotesParticipantsToRegularUsers(string $session, string $id, mixed $participants): Response
    {
        return $this->connector->send(new DemotesParticipantsToRegularUsers($session, $id, $participants));
    }
}
