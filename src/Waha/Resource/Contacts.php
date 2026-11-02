<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\CreateOrUpdateContact;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\GetContactBasicInfo;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\GetContactBasicInfoForSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Contacts extends Resource
{
    public function createOrUpdateContact(string $session, string $chatId, mixed $firstName = null, mixed $lastName = null): Response
    {
        return $this->connector->send(new CreateOrUpdateContact($session, $chatId, $firstName, $lastName));
    }

    public function getContactBasicInfo(?string $contactId = null, ?string $session = null): Response
    {
        return $this->connector->send(new GetContactBasicInfo($contactId, $session));
    }

    public function getContactBasicInfoForSession(
        string $session,
        string $id,
    ): Response {
        return $this->connector->send(new GetContactBasicInfoForSession($session, $id));
    }
}
