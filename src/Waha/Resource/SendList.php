<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendList\SendListMessageInteractive;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class SendList extends Resource
{
    public function sendListMessageInteractive(mixed $chatId, mixed $message, mixed $session, mixed $replyTo): Response
    {
        return $this->connector->send(new SendListMessageInteractive($chatId, $message, $session, $replyTo));
    }
}
