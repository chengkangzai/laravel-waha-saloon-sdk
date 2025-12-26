<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendVideo\SendVideo as SendVideoRequest;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendVideo extends Resource
{
    public function sendVideo(
        mixed $chatId,
        mixed $file,
        mixed $convert,
        mixed $session,
        mixed $replyTo,
        mixed $asNote,
        mixed $caption,
    ): Response {
        return $this->connector->send(new SendVideoRequest($chatId, $file, $convert, $session, $replyTo, $asNote, $caption));
    }
}
