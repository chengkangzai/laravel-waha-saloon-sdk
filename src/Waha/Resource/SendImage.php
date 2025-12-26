<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendImage\SendImage as SendImageRequest;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class SendImage extends Resource
{
    public function sendImage(mixed $chatId, mixed $file, mixed $session, mixed $replyTo, mixed $caption): Response
    {
        return $this->connector->send(new SendImageRequest($chatId, $file, $session, $replyTo, $caption));
    }
}
