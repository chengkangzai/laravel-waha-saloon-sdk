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
     * @param  string  $downloadMedia  Download media for messages
     */
    public function getsMessageById(string $session, string $chatId, string $messageId, ?string $downloadMedia): Response
    {
        return $this->connector->send(new GetsMessageById($session, $chatId, $messageId, $downloadMedia));
    }

    public function deletesMessageFromTheChat(string $session, string $chatId, string $messageId): Response
    {
        return $this->connector->send(new DeletesMessageFromTheChat($session, $chatId, $messageId));
    }

    public function editsMessageInTheChat(
        string $session,
        string $chatId,
        string $messageId,
        mixed $text,
        mixed $linkPreview,
        mixed $linkPreviewHighQuality,
    ): Response {
        return $this->connector->send(new EditsMessageInTheChat($session, $chatId, $messageId, $text, $linkPreview, $linkPreviewHighQuality));
    }

    /**
     * @param  string  $sortBy  Sort by field
     * @param  string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     * @param  string  $downloadMedia  Download media for messages
     * @param  string  $filterTimestampLte  Filter messages before this timestamp (inclusive)
     * @param  string  $filterTimestampGte  Filter messages after this timestamp (inclusive)
     * @param  string  $filterFromMe  From me filter (by default shows all messages)
     * @param  string  $filterAck  Filter messages by acknowledgment status
     */
    public function getMessagesInChat(
        ?string $sortBy,
        ?string $sortOrder,
        ?string $downloadMedia,
        ?string $chatId,
        ?string $session,
        ?string $limit,
        ?string $offset,
        ?string $filterTimestampLte,
        ?string $filterTimestampGte,
        ?string $filterFromMe,
        ?string $filterAck,
    ): Response {
        return $this->connector->send(new GetMessagesInChat($sortBy, $sortOrder, $downloadMedia, $chatId, $session, $limit, $offset, $filterTimestampLte, $filterTimestampGte, $filterFromMe, $filterAck));
    }
}
