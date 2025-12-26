<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Subscribe\SubscribeToPresenceEventsForTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Subscribe extends Resource
{
    public function subscribeToPresenceEventsForTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new SubscribeToPresenceEventsForTheChat($session, $chatId));
    }
}
