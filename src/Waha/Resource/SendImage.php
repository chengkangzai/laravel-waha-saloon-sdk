<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendImage\SendImage as SendImageRequest;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendImage extends Resource
{
    public function sendImage(mixed $chatId = null, mixed $file = null, mixed $session = null, mixed $replyTo = null, mixed $caption = null, ?array $mentions = null): Response
    {
        return $this->connector->send(new SendImageRequest($chatId, $file, $session, $replyTo, $caption, $mentions));
    }
}
