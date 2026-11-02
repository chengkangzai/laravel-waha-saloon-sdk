<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendSeen\ChattingControllerSendSeen;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendSeen extends Resource
{
    public function chattingControllerSendSeen(
        mixed $chatId = null,
        mixed $session = null,
        mixed $messageId = null,
        mixed $messageIds = null,
        mixed $participant = null,
    ): Response {
        return $this->connector->send(new ChattingControllerSendSeen($chatId, $session, $messageId, $messageIds, $participant));
    }
}
