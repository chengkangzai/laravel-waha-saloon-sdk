<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendText\SendTextMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendText\SendTextMessageViaQuery;
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
        ?string $id = null,
        ?array $mentions = null,
    ): Response {
        return $this->connector->send(new SendTextMessage($chatId, $text, $session, $replyTo, $linkPreview, $linkPreviewHighQuality, $id, $mentions));
    }

    /**
     * @deprecated Use sendTextMessage (POST).
     */
    public function sendTextMessageViaQuery(
        string $phone,
        string $text,
        string $session,
    ): Response {
        return $this->connector->send(new SendTextMessageViaQuery($phone, $text, $session));
    }
}
