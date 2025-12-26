<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\ClearsAllMessagesFromTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\GetChatsByLabel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\GetLabelsForTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\GetsMessagesInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\SaveLabelsForTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Chats extends Resource
{
    /**
     * @param  string  $sortBy  Sort by field
     * @param  string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     * @param  string  $downloadMedia  Download media for messages
     * @param  string  $filterTimestampLte  Filter messages before this timestamp (inclusive)
     * @param  string  $filterTimestampGte  Filter messages after this timestamp (inclusive)
     * @param  string  $filterFromMe  From me filter (by default shows all messages)
     * @param  string  $filterAck  Filter messages by acknowledgment status
     */
    public function getsMessagesInTheChat(
        string $session,
        string $chatId,
        ?string $sortBy,
        ?string $sortOrder,
        ?string $downloadMedia,
        ?string $limit,
        ?string $offset,
        ?string $filterTimestampLte,
        ?string $filterTimestampGte,
        ?string $filterFromMe,
        ?string $filterAck,
    ): Response {
        return $this->connector->send(new GetsMessagesInTheChat($session, $chatId, $sortBy, $sortOrder, $downloadMedia, $limit, $offset, $filterTimestampLte, $filterTimestampGte, $filterFromMe, $filterAck));
    }

    public function clearsAllMessagesFromTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new ClearsAllMessagesFromTheChat($session, $chatId));
    }

    public function getChatsByLabel(string $session, string $labelId): Response
    {
        return $this->connector->send(new GetChatsByLabel($session, $labelId));
    }

    public function getLabelsForTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new GetLabelsForTheChat($session, $chatId));
    }

    public function saveLabelsForTheChat(string $session, string $chatId, mixed $labels): Response
    {
        return $this->connector->send(new SaveLabelsForTheChat($session, $chatId, $labels));
    }
}
