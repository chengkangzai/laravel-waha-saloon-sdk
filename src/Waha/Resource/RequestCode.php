<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\RequestCode\RequestAuthenticationCode;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class RequestCode extends Resource
{
    public function requestAuthenticationCode(string $session, mixed $phoneNumber, mixed $method): Response
    {
        return $this->connector->send(new RequestAuthenticationCode($session, $phoneNumber, $method));
    }
}
