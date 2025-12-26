<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Count\GetTheNumberOfGroups;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Count\GetTheNumberOfKnownLids;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Count extends Resource
{
    public function getTheNumberOfKnownLids(string $session): Response
    {
        return $this->connector->send(new GetTheNumberOfKnownLids($session));
    }

    public function getTheNumberOfGroups(string $session): Response
    {
        return $this->connector->send(new GetTheNumberOfGroups($session));
    }
}
