<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\About\GetsTheContactAboutInfo;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class About extends Resource
{
    public function getsTheContactAboutInfo(?string $contactId, ?string $session): Response
    {
        return $this->connector->send(new GetsTheContactAboutInfo($contactId, $session));
    }
}
