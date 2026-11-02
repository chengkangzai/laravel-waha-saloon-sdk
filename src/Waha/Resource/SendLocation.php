<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendLocation\ChattingControllerSendLocation;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendLocation extends Resource
{
    public function chattingControllerSendLocation(
        mixed $chatId = null,
        mixed $latitude = null,
        mixed $longitude = null,
        mixed $title = null,
        mixed $session = null,
        mixed $replyTo = null,
        ?string $id = null,
    ): Response {
        return $this->connector->send(new ChattingControllerSendLocation($chatId, $latitude, $longitude, $title, $session, $replyTo, $id));
    }
}
