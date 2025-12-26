<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Api\DeletesTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Api extends Resource
{
    public function deletesTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new DeletesTheChat($session, $chatId));
    }
}
