<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendLocation\ChattingControllerSendLocation;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendLocation extends Resource
{
    public function chattingControllerSendLocation(
        mixed $chatId,
        mixed $latitude,
        mixed $longitude,
        mixed $title,
        mixed $session,
        mixed $replyTo,
    ): Response {
        return $this->connector->send(new ChattingControllerSendLocation($chatId, $latitude, $longitude, $title, $session, $replyTo));
    }
}
