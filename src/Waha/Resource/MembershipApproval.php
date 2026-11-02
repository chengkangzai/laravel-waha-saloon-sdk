<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\MembershipApproval\GetSettingsApproveNewMembers;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\MembershipApproval\UpdateSettingsApproveNewMembers;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class MembershipApproval extends Resource
{
    public function updateSettingsApproveNewMembers(
        string $session,
        string $id,
        bool $newMembersApprovalRequired,
    ): Response {
        return $this->connector->send(new UpdateSettingsApproveNewMembers($session, $id, $newMembersApprovalRequired));
    }

    public function getSettingsApproveNewMembers(
        string $session,
        string $id,
    ): Response {
        return $this->connector->send(new GetSettingsApproveNewMembers($session, $id));
    }
}
