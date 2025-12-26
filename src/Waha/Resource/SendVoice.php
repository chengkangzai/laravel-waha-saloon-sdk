<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendVoice\SendVoiceMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendVoice extends Resource
{
    public function sendVoiceMessage(
        mixed $chatId,
        mixed $file,
        mixed $convert,
        mixed $session,
        mixed $replyTo,
    ): Response {
        return $this->connector->send(new SendVoiceMessage($chatId, $file, $convert, $session, $replyTo));
    }
}
