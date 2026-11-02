<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages\DeletesMessageFromTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages\EditsMessageInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages\GetMessagesInChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages\GetsMessageById;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Messages extends Resource
{
    /**
     * @param  string|bool|null  $downloadMedia  Download media for messages
     */
    public function getsMessageById(string $session, string $chatId, string $messageId, string|bool|null $downloadMedia = null, ?array $downloadMediaMimetypes = null, ?bool $merge = null): Response
    {
        return $this->connector->send(new GetsMessageById($session, $chatId, $messageId, $downloadMedia, $downloadMediaMimetypes, $merge));
    }

    public function deletesMessageFromTheChat(string $session, string $chatId, string $messageId): Response
    {
        return $this->connector->send(new DeletesMessageFromTheChat($session, $chatId, $messageId));
    }

    public function editsMessageInTheChat(
        string $session,
        string $chatId,
        string $messageId,
        mixed $text = null,
        mixed $linkPreview = null,
        mixed $linkPreviewHighQuality = null,
        ?array $mentions = null,
    ): Response {
        return $this->connector->send(new EditsMessageInTheChat($session, $chatId, $messageId, $text, $linkPreview, $linkPreviewHighQuality, $mentions));
    }

    /**
     * @param  null|string  $sortBy  Sort by field
     * @param  null|string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     * @param  string|bool|null  $downloadMedia  Download media for messages
     * @param  string|int|float|null  $filterTimestampLte  Filter messages before this timestamp (inclusive)
     * @param  string|int|float|null  $filterTimestampGte  Filter messages after this timestamp (inclusive)
     * @param  string|bool|null  $filterFromMe  From me filter (by default shows all messages)
     * @param  null|string  $filterAck  Filter messages by acknowledgment status
     *
     * @deprecated Use Chats\GetsMessagesInTheChat.
     */
    public function getMessagesInChat(
        ?string $sortBy = null,
        ?string $sortOrder = null,
        string|bool|null $downloadMedia = null,
        ?string $chatId = null,
        ?string $session = null,
        string|int|float|null $limit = null,
        string|int|float|null $offset = null,
        string|int|float|null $filterTimestampLte = null,
        string|int|float|null $filterTimestampGte = null,
        string|bool|null $filterFromMe = null,
        ?string $filterAck = null,
        ?array $downloadMediaMimetypes = null,
        ?bool $merge = null,
    ): Response {
        return $this->connector->send(new GetMessagesInChat($sortBy, $sortOrder, $downloadMedia, $chatId, $session, $limit, $offset, $filterTimestampLte, $filterTimestampGte, $filterFromMe, $filterAck, $downloadMediaMimetypes, $merge));
    }
}
