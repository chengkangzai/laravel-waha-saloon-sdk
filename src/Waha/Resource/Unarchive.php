<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Unarchive\UnarchiveTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Unarchive extends Resource
{
    public function unarchiveTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new UnarchiveTheChat($session, $chatId));
    }
}
