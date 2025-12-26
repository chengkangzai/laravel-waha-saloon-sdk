<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Read\ReadUnreadMessagesInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Read extends Resource
{
    /**
     * @param  string  $messages  How much messages to read (latest first)
     * @param  string  $days  How much days to read (latest first)
     */
    public function readUnreadMessagesInTheChat(
        string $session,
        string $chatId,
        ?string $messages,
        ?string $days,
    ): Response {
        return $this->connector->send(new ReadUnreadMessagesInTheChat($session, $chatId, $messages, $days));
    }
}
