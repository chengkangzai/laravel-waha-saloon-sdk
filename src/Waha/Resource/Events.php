<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Events\SendEventMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Events extends Resource
{
    public function sendEventMessage(string $session, mixed $chatId, mixed $event, mixed $replyTo): Response
    {
        return $this->connector->send(new SendEventMessage($session, $chatId, $event, $replyTo));
    }
}
