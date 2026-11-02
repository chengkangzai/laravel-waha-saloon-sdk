<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendVideo\SendVideo as SendVideoRequest;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendVideo extends Resource
{
    public function sendVideo(
        mixed $chatId = null,
        mixed $file = null,
        mixed $convert = null,
        mixed $session = null,
        mixed $replyTo = null,
        mixed $asNote = null,
        mixed $caption = null,
        ?array $mentions = null,
    ): Response {
        return $this->connector->send(new SendVideoRequest($chatId, $file, $convert, $session, $replyTo, $asNote, $caption, $mentions));
    }
}
