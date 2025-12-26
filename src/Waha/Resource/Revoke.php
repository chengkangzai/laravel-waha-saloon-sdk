<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Revoke\InvalidatesTheCurrentGroupInviteCodeAndGeneratesNewOne;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Revoke extends Resource
{
    public function invalidatesTheCurrentGroupInviteCodeAndGeneratesNewOne(string $session, string $id): Response
    {
        return $this->connector->send(new InvalidatesTheCurrentGroupInviteCodeAndGeneratesNewOne($session, $id));
    }
}
