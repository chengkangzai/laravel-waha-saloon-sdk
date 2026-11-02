<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Reply\DeprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Reply\ReplyOnButtonMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Reply extends Resource
{
    public function replyOnButtonMessage(
        mixed $chatId = null,
        mixed $selectedDisplayText = null,
        mixed $selectedButtonId = null,
        mixed $session = null,
        mixed $replyTo = null,
    ): Response {
        return $this->connector->send(new ReplyOnButtonMessage($chatId, $selectedDisplayText, $selectedButtonId, $session, $replyTo));
    }

    /**
     * @deprecated Use SendText\SendTextMessage with replyTo.
     */
    public function deprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc(
        mixed $chatId = null,
        mixed $text = null,
        mixed $session = null,
        mixed $replyTo = null,
        mixed $linkPreview = null,
        mixed $linkPreviewHighQuality = null,
        ?string $id = null,
        ?array $mentions = null,
    ): Response {
        return $this->connector->send(new DeprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc($chatId, $text, $session, $replyTo, $linkPreview, $linkPreviewHighQuality, $id, $mentions));
    }
}
