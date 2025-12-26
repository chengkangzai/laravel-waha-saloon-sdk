<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\GetTheServerStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\SetProfileStatusAbout;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Status extends Resource
{
    public function setProfileStatusAbout(string $session, mixed $status): Response
    {
        return $this->connector->send(new SetProfileStatusAbout($session, $status));
    }

    public function getTheServerStatus(): Response
    {
        return $this->connector->send(new GetTheServerStatus);
    }
}
