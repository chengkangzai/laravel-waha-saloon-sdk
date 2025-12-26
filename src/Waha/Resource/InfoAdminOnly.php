<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\InfoAdminOnly\GetTheGroupInfoAdminOnlySettings;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\InfoAdminOnly\UpdatesTheGroupInfoAdminOnlySettings;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class InfoAdminOnly extends Resource
{
    public function updatesTheGroupInfoAdminOnlySettings(string $session, string $id, mixed $adminsOnly): Response
    {
        return $this->connector->send(new UpdatesTheGroupInfoAdminOnlySettings($session, $id, $adminsOnly));
    }

    public function getTheGroupInfoAdminOnlySettings(string $session, string $id): Response
    {
        return $this->connector->send(new GetTheGroupInfoAdminOnlySettings($session, $id));
    }
}
