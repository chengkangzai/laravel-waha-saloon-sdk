<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendButtons\SendButtonsMessageInteractive;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendButtons extends Resource
{
    /**
     * @deprecated Use SendList\SendListMessageInteractive or SendText\SendTextMessage.
     */
    public function sendButtonsMessageInteractive(
        mixed $chatId = null,
        mixed $header = null,
        mixed $body = null,
        mixed $footer = null,
        mixed $buttons = null,
        mixed $session = null,
        mixed $headerImage = null,
    ): Response {
        return $this->connector->send(new SendButtonsMessageInteractive($chatId, $header, $body, $footer, $buttons, $session, $headerImage));
    }
}
