<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Send\ReplyOnButtonMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Send\SendTextMessageWithCustomLinkPreview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Send extends Resource
{
    public function sendTextMessageWithCustomLinkPreview(
        mixed $chatId,
        mixed $text,
        mixed $preview,
        mixed $session,
        mixed $replyTo,
        mixed $linkPreviewHighQuality,
    ): Response {
        return $this->connector->send(new SendTextMessageWithCustomLinkPreview($chatId, $text, $preview, $session, $replyTo, $linkPreviewHighQuality));
    }

    public function replyOnButtonMessage(
        mixed $chatId,
        mixed $selectedDisplayText,
        mixed $selectedButtonId,
        mixed $session,
        mixed $replyTo,
    ): Response {
        return $this->connector->send(new ReplyOnButtonMessage($chatId, $selectedDisplayText, $selectedButtonId, $session, $replyTo));
    }
}
