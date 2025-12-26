<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendSeen\ChattingControllerSendSeen;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class SendSeen extends Resource
{
    public function chattingControllerSendSeen(
        mixed $chatId,
        mixed $session,
        mixed $messageId,
        mixed $messageIds,
        mixed $participant,
    ): Response {
        return $this->connector->send(new ChattingControllerSendSeen($chatId, $session, $messageId, $messageIds, $participant));
    }
}
