<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Reply\DeprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Reply\ReplyOnButtonMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Reply extends Resource
{
    public function replyOnButtonMessage(
        mixed $chatId,
        mixed $selectedDisplayText,
        mixed $selectedButtonId,
        mixed $session,
        mixed $replyTo,
    ): Response {
        return $this->connector->send(new ReplyOnButtonMessage($chatId, $selectedDisplayText, $selectedButtonId, $session, $replyTo));
    }

    public function deprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc(
        mixed $chatId,
        mixed $text,
        mixed $session,
        mixed $replyTo,
        mixed $linkPreview,
        mixed $linkPreviewHighQuality,
    ): Response {
        return $this->connector->send(new DeprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc($chatId, $text, $session, $replyTo, $linkPreview, $linkPreviewHighQuality));
    }
}
