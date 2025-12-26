<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\LinkCustomPreview\SendTextMessageWithCustomLinkPreview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class LinkCustomPreview extends Resource
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
}
