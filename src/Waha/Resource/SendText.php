<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendText\SendTextMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class SendText extends Resource
{
    public function sendTextMessage(
        mixed $chatId,
        mixed $text,
        mixed $session,
        mixed $replyTo,
        mixed $linkPreview,
        mixed $linkPreviewHighQuality,
    ): Response {
        return $this->connector->send(new SendTextMessage($chatId, $text, $session, $replyTo, $linkPreview, $linkPreviewHighQuality));
    }
}
