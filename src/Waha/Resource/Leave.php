<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Leave\LeaveTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Leave extends Resource
{
    public function leaveTheGroup(string $session, string $id): Response
    {
        return $this->connector->send(new LeaveTheGroup($session, $id));
    }
}
