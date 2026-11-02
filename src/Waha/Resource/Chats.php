<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\ClearsAllMessagesFromTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\GetChatsByLabel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\GetLabelsForTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\GetsMessagesInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\SaveLabelsForTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Chats extends Resource
{
    /**
     * @param  null|string  $sortBy  Sort by field
     * @param  null|string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     * @param  string|bool|null  $downloadMedia  Download media for messages
     * @param  string|int|float|null  $filterTimestampLte  Filter messages before this timestamp (inclusive)
     * @param  string|int|float|null  $filterTimestampGte  Filter messages after this timestamp (inclusive)
     * @param  string|bool|null  $filterFromMe  From me filter (by default shows all messages)
     * @param  null|string  $filterAck  Filter messages by acknowledgment status
     */
    public function getsMessagesInTheChat(
        string $session,
        string $chatId,
        ?string $sortBy = null,
        ?string $sortOrder = null,
        string|bool|null $downloadMedia = null,
        string|int|float|null $limit = null,
        string|int|float|null $offset = null,
        string|int|float|null $filterTimestampLte = null,
        string|int|float|null $filterTimestampGte = null,
        string|bool|null $filterFromMe = null,
        ?string $filterAck = null,
        ?array $downloadMediaMimetypes = null,
        ?bool $merge = null,
    ): Response {
        return $this->connector->send(new GetsMessagesInTheChat($session, $chatId, $sortBy, $sortOrder, $downloadMedia, $limit, $offset, $filterTimestampLte, $filterTimestampGte, $filterFromMe, $filterAck, $downloadMediaMimetypes, $merge));
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

    public function saveLabelsForTheChat(string $session, string $chatId, mixed $labels = null): Response
    {
        return $this->connector->send(new SaveLabelsForTheChat($session, $chatId, $labels));
    }
}
