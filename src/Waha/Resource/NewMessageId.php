<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\NewMessageId\GenerateMessageIdYouCanUseToBatchContacts;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class NewMessageId extends Resource
{
    public function generateMessageIdYouCanUseToBatchContacts(string $session): Response
    {
        return $this->connector->send(new GenerateMessageIdYouCanUseToBatchContacts($session));
    }
}
