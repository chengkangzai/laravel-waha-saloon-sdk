<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\CreateOrUpdateContact;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\GetContactBasicInfo;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Contacts extends Resource
{
    public function createOrUpdateContact(string $session, string $chatId, mixed $firstName, mixed $lastName): Response
    {
        return $this->connector->send(new CreateOrUpdateContact($session, $chatId, $firstName, $lastName));
    }

    public function getContactBasicInfo(?string $contactId, ?string $session): Response
    {
        return $this->connector->send(new GetContactBasicInfo($contactId, $session));
    }
}
