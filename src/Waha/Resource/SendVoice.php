<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendVoice\SendVoiceMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendVoice extends Resource
{
    public function sendVoiceMessage(
        mixed $chatId = null,
        mixed $file = null,
        mixed $convert = null,
        mixed $session = null,
        mixed $replyTo = null,
    ): Response {
        return $this->connector->send(new SendVoiceMessage($chatId, $file, $convert, $session, $replyTo));
    }
}
