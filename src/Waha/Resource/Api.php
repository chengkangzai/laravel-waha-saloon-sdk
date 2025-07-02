<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Api\ArchiveTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Api\DeletesTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Api\GetsChatPicture;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Api\UnarchiveTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Api\UnreadTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Api extends Resource
{
    public function deletesTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new DeletesTheChat($session, $chatId));
    }

    /**
     * @param  string  $refresh  Refresh the picture from the server (24h cache by default). Do not refresh if not needed, you can get rate limit error
     */
    public function getsChatPicture(string $session, string $chatId, ?string $refresh): Response
    {
        return $this->connector->send(new GetsChatPicture($session, $chatId, $refresh));
    }

    public function archiveTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new ArchiveTheChat($session, $chatId));
    }

    public function unarchiveTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new UnarchiveTheChat($session, $chatId));
    }

    public function unreadTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new UnreadTheChat($session, $chatId));
    }
}
