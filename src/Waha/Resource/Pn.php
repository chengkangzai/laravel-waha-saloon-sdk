<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Pn\GetLidByPhoneNumberChatId;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Pn extends Resource
{
    public function getLidByPhoneNumberChatId(string $session, string $phoneNumber): Response
    {
        return $this->connector->send(new GetLidByPhoneNumberChatId($session, $phoneNumber));
    }
}
