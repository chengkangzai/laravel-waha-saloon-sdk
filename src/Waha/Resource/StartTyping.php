<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\StartTyping\ChattingControllerStartTyping;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class StartTyping extends Resource
{
    public function chattingControllerStartTyping(mixed $chatId, mixed $session): Response
    {
        return $this->connector->send(new ChattingControllerStartTyping($chatId, $session));
    }
}
