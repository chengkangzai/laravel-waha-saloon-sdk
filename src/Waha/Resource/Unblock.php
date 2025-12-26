<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Unblock\UnblockContact;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Unblock extends Resource
{
    public function unblockContact(mixed $contactId, mixed $session): Response
    {
        return $this->connector->send(new UnblockContact($contactId, $session));
    }
}
