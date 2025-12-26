<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Unread\UnreadTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Unread extends Resource
{
    public function unreadTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new UnreadTheChat($session, $chatId));
    }
}
