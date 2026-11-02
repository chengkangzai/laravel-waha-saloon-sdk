<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\MemberShareHistoryMode\GetSettingsMembersCanShareHistory;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\MemberShareHistoryMode\UpdateSettingsMembersCanShareHistory;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class MemberShareHistoryMode extends Resource
{
    public function updateSettingsMembersCanShareHistory(
        string $session,
        string $id,
        bool $membersCanShareHistory,
    ): Response {
        return $this->connector->send(new UpdateSettingsMembersCanShareHistory($session, $id, $membersCanShareHistory));
    }

    public function getSettingsMembersCanShareHistory(
        string $session,
        string $id,
    ): Response {
        return $this->connector->send(new GetSettingsMembersCanShareHistory($session, $id));
    }
}
