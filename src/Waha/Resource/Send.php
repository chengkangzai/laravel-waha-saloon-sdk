<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Send\ReplyOnButtonMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Send\SendTextMessageWithCustomLinkPreview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Send extends Resource
{
    public function sendTextMessageWithCustomLinkPreview(
        mixed $chatId = null,
        mixed $text = null,
        mixed $preview = null,
        mixed $session = null,
        mixed $replyTo = null,
        mixed $linkPreviewHighQuality = null,
    ): Response {
        return $this->connector->send(new SendTextMessageWithCustomLinkPreview($chatId, $text, $preview, $session, $replyTo, $linkPreviewHighQuality));
    }

    public function replyOnButtonMessage(
        mixed $chatId = null,
        mixed $selectedDisplayText = null,
        mixed $selectedButtonId = null,
        mixed $session = null,
        mixed $replyTo = null,
    ): Response {
        return $this->connector->send(new ReplyOnButtonMessage($chatId, $selectedDisplayText, $selectedButtonId, $session, $replyTo));
    }
}
