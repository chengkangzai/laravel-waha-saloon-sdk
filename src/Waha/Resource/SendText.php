<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendText\SendTextMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendText extends Resource
{
    public function sendTextMessage(
        mixed $chatId = null,
        mixed $text = null,
        mixed $session = null,
        mixed $replyTo = null,
        mixed $linkPreview = null,
        mixed $linkPreviewHighQuality = null,
    ): Response {
        return $this->connector->send(new SendTextMessage(
            $chatId,
            $text,
            $session,
            $replyTo,
            $linkPreview,
            $linkPreviewHighQuality,
        ));
    }
}
