<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\ForwardMessage\ChattingControllerForwardMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class ForwardMessage extends Resource
{
    public function chattingControllerForwardMessage(mixed $chatId, mixed $messageId, mixed $session): Response
    {
        return $this->connector->send(new ChattingControllerForwardMessage($chatId, $messageId, $session));
    }
}
