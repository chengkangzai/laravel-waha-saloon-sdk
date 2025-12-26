<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Pin\PinsMessageInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Pin extends Resource
{
    public function pinsMessageInTheChat(string $session, string $chatId, string $messageId, mixed $duration): Response
    {
        return $this->connector->send(new PinsMessageInTheChat($session, $chatId, $messageId, $duration));
    }
}
