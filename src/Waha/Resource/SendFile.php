<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendFile\SendFile as SendFileRequest;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendFile extends Resource
{
    public function sendFile(mixed $chatId = null, mixed $file = null, mixed $session = null, mixed $replyTo = null, mixed $caption = null, ?array $mentions = null): Response
    {
        return $this->connector->send(new SendFileRequest($chatId, $file, $session, $replyTo, $caption, $mentions));
    }
}
