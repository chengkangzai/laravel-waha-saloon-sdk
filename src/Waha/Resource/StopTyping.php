<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\StopTyping\ChattingControllerStopTyping;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class StopTyping extends Resource
{
    public function chattingControllerStopTyping(mixed $chatId, mixed $session): Response
    {
        return $this->connector->send(new ChattingControllerStopTyping($chatId, $session));
    }
}
