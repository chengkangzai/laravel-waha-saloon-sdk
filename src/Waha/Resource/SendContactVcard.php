<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendContactVcard\ChattingControllerSendContactVcard;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendContactVcard extends Resource
{
    public function chattingControllerSendContactVcard(
        mixed $chatId = null,
        mixed $contacts = null,
        mixed $session = null,
        mixed $replyTo = null,
        ?string $id = null,
    ): Response {
        return $this->connector->send(new ChattingControllerSendContactVcard($chatId, $contacts, $session, $replyTo, $id));
    }
}
