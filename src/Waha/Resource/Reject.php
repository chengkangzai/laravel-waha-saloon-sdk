<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Reject\RejectIncomingCall;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Reject extends Resource
{
    public function rejectIncomingCall(string $session, mixed $from, mixed $id): Response
    {
        return $this->connector->send(new RejectIncomingCall($session, $from, $id));
    }
}
