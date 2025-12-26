<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Profile\GetMyProfile;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Profile extends Resource
{
    public function getMyProfile(string $session): Response
    {
        return $this->connector->send(new GetMyProfile($session));
    }
}
