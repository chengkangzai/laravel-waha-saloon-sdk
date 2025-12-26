<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Me\GetInformationAboutTheAuthenticatedAccount;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Me extends Resource
{
    public function getInformationAboutTheAuthenticatedAccount(string $session): Response
    {
        return $this->connector->send(new GetInformationAboutTheAuthenticatedAccount($session));
    }
}
