<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Unpin\UnpinsMessageInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Unpin extends Resource
{
    public function unpinsMessageInTheChat(string $session, string $chatId, string $messageId): Response
    {
        return $this->connector->send(new UnpinsMessageInTheChat($session, $chatId, $messageId));
    }
}
