<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Archive\ArchiveTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Archive extends Resource
{
    public function archiveTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new ArchiveTheChat($session, $chatId));
    }
}
