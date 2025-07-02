<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Presence\GetThePresenceForTheChatIdIfItHasntBeenSubscribedItAlsoSubscribesToIt;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Presence\SubscribeToPresenceEventsForTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Presence extends Resource
{
    public function getThePresenceForTheChatIdIfItHasntBeenSubscribedItAlsoSubscribesToIt(
        string $session,
        string $chatId,
    ): Response {
        return $this->connector->send(new GetThePresenceForTheChatIdIfItHasntBeenSubscribedItAlsoSubscribesToIt($session, $chatId));
    }

    public function subscribeToPresenceEventsForTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new SubscribeToPresenceEventsForTheChat($session, $chatId));
    }
}
