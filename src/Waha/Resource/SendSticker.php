<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendSticker\SendSticker as SendStickerRequest;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendSticker extends Resource
{
    public function sendSticker(
        string $chatId,
        array $file,
        string $session,
        ?string $replyTo = null,
    ): Response {
        return $this->connector->send(new SendStickerRequest($chatId, $file, $session, $replyTo));
    }
}
