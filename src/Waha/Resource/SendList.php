<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendList\SendListMessageInteractive;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendList extends Resource
{
    public function sendListMessageInteractive(mixed $chatId = null, mixed $message = null, mixed $session = null, mixed $replyTo = null): Response
    {
        return $this->connector->send(new SendListMessageInteractive($chatId, $message, $session, $replyTo));
    }
}
