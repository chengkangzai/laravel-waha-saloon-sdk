<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\MemberAddMode\GetSettingsWhoCanAddNewMembers;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\MemberAddMode\UpdateSettingsWhoCanAddNewMembers;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class MemberAddMode extends Resource
{
    public function updateSettingsWhoCanAddNewMembers(
        string $session,
        string $id,
        bool $membersCanAddNewMember,
    ): Response {
        return $this->connector->send(new UpdateSettingsWhoCanAddNewMembers($session, $id, $membersCanAddNewMember));
    }

    public function getSettingsWhoCanAddNewMembers(
        string $session,
        string $id,
    ): Response {
        return $this->connector->send(new GetSettingsWhoCanAddNewMembers($session, $id));
    }
}
