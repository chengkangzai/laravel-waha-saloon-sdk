<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Join\JoinGroupViaCode;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Join extends Resource
{
    public function joinGroupViaCode(string $session, mixed $code): Response
    {
        return $this->connector->send(new JoinGroupViaCode($session, $code));
    }
}
