<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Video\ConvertVideoToWhatsAppFormatMp4;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Video\SendVideoStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Video extends Resource
{
    public function sendVideoStatus(
        string $session,
        mixed $file = null,
        mixed $convert = null,
        mixed $id = null,
        mixed $contacts = null,
        mixed $caption = null,
    ): Response {
        return $this->connector->send(new SendVideoStatus($session, $file, $convert, $id, $contacts, $caption));
    }

    public function convertVideoToWhatsAppFormatMp4(string $session, mixed $url = null, mixed $data = null): Response
    {
        return $this->connector->send(new ConvertVideoToWhatsAppFormatMp4($session, $url, $data));
    }
}
