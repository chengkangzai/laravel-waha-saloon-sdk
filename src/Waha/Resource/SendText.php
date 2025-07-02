<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendText\SendTextMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

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

    /**
     * @todo Fix duplicated method name
     *
     * @param  string  $phone  (Required)
     * @param  string  $text  (Required)
     * @param  string  $session  (Required)
     */
    public function sendTextMessageDuplicate1(?string $phone, ?string $text, ?string $session): Response
    {
        return $this->connector->send(new SendTextMessage($phone, $text, $session));
    }
}
