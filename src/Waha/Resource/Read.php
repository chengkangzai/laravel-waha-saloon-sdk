<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Read\ReadUnreadMessagesInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Read extends Resource
{
    /**
     * @param  string|int|float|null  $messages  How much messages to read (latest first)
     * @param  string|int|float|null  $days  How much days to read (latest first)
     */
    public function readUnreadMessagesInTheChat(
        string $session,
        string $chatId,
        string|int|float|null $messages = null,
        string|int|float|null $days = null,
    ): Response {
        return $this->connector->send(new ReadUnreadMessagesInTheChat($session, $chatId, $messages, $days));
    }
}
