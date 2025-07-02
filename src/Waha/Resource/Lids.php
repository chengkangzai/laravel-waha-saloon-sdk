<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Lids\GetAllKnownLidsToPhoneNumberMapping;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Lids\GetLidByPhoneNumberChatId;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Lids\GetPhoneNumberByLid;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Lids\GetTheNumberOfKnownLids;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Lids extends Resource
{
    public function getAllKnownLidsToPhoneNumberMapping(string $session, ?string $limit, ?string $offset): Response
    {
        return $this->connector->send(new GetAllKnownLidsToPhoneNumberMapping($session, $limit, $offset));
    }

    public function getTheNumberOfKnownLids(string $session): Response
    {
        return $this->connector->send(new GetTheNumberOfKnownLids($session));
    }

    public function getPhoneNumberByLid(string $session, string $lid): Response
    {
        return $this->connector->send(new GetPhoneNumberByLid($session, $lid));
    }

    public function getLidByPhoneNumberChatId(string $session, string $phoneNumber): Response
    {
        return $this->connector->send(new GetLidByPhoneNumberChatId($session, $phoneNumber));
    }
}
