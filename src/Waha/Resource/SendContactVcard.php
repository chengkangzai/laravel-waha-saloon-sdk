<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendContactVcard\ChattingControllerSendContactVcard;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendContactVcard extends Resource
{
    public function chattingControllerSendContactVcard(
        mixed $chatId,
        mixed $contacts,
        mixed $session,
        mixed $replyTo,
    ): Response {
        return $this->connector->send(new ChattingControllerSendContactVcard($chatId, $contacts, $session, $replyTo));
    }
}
