<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Presence\GetThePresenceForTheChatIdIfItHasntBeenSubscribedItAlsoSubscribesToIt;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Presence extends Resource
{
    public function getThePresenceForTheChatIdIfItHasntBeenSubscribedItAlsoSubscribesToIt(
        string $session,
        string $chatId,
    ): Response {
        return $this->connector->send(new GetThePresenceForTheChatIdIfItHasntBeenSubscribedItAlsoSubscribesToIt($session, $chatId));
    }
}
