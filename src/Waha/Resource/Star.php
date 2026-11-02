<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Star\StarOrUnstarMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Star extends Resource
{
    public function starOrUnstarMessage(mixed $messageId = null, mixed $chatId = null, mixed $star = null, mixed $session = null): Response
    {
        return $this->connector->send(new StarOrUnstarMessage($messageId, $chatId, $star, $session));
    }
}
