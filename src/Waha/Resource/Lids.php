<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Lids\GetPhoneNumberByLid;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Lids extends Resource
{
    public function getPhoneNumberByLid(string $session, string $lid): Response
    {
        return $this->connector->send(new GetPhoneNumberByLid($session, $lid));
    }
}
