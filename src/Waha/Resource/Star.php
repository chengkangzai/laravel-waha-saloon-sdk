<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Star\StarOrUnstarMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Star extends Resource
{
    public function starOrUnstarMessage(mixed $messageId, mixed $chatId, mixed $star, mixed $session): Response
    {
        return $this->connector->send(new StarOrUnstarMessage($messageId, $chatId, $star, $session));
    }
}
