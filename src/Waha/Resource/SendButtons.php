<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendButtons\SendButtonsMessageInteractive;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class SendButtons extends Resource
{
    public function sendButtonsMessageInteractive(
        mixed $chatId,
        mixed $header,
        mixed $body,
        mixed $footer,
        mixed $buttons,
        mixed $session,
        mixed $headerImage,
    ): Response {
        return $this->connector->send(new SendButtonsMessageInteractive($chatId, $header, $body, $footer, $buttons, $session, $headerImage));
    }
}
