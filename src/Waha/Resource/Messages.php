<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages\DeletesMessageFromTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages\EditsMessageInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages\GetsMessageById;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages\PinsMessageInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Messages\UnpinsMessageInTheChat;
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

    public function pinsMessageInTheChat(string $session, string $chatId, string $messageId, mixed $duration): Response
    {
        return $this->connector->send(new PinsMessageInTheChat($session, $chatId, $messageId, $duration));
    }

    public function unpinsMessageInTheChat(string $session, string $chatId, string $messageId): Response
    {
        return $this->connector->send(new UnpinsMessageInTheChat($session, $chatId, $messageId));
    }
}
