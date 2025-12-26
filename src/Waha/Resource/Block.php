<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Block\BlockContact;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Block extends Resource
{
    public function blockContact(mixed $contactId, mixed $session): Response
    {
        return $this->connector->send(new BlockContact($contactId, $session));
    }
}
