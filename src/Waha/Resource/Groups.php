<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups\DeleteTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups\GetTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups\LeaveTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups\UpdatesTheGroupDescription;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups\UpdatesTheGroupSubject;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Groups extends Resource
{
    public function getTheGroup(string $session, string $id): Response
    {
        return $this->connector->send(new GetTheGroup($session, $id));
    }

    public function deleteTheGroup(string $session, string $id): Response
    {
        return $this->connector->send(new DeleteTheGroup($session, $id));
    }

    public function leaveTheGroup(string $session, string $id): Response
    {
        return $this->connector->send(new LeaveTheGroup($session, $id));
    }

    public function updatesTheGroupDescription(string $session, string $id, mixed $description): Response
    {
        return $this->connector->send(new UpdatesTheGroupDescription($session, $id, $description));
    }

    public function updatesTheGroupSubject(string $session, string $id, mixed $subject): Response
    {
        return $this->connector->send(new UpdatesTheGroupSubject($session, $id, $subject));
    }
}
