<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Video\ConvertVideoToWhatsAppFormatMp4;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Video\SendVideoStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Video extends Resource
{
    public function sendVideoStatus(
        string $session,
        mixed $file,
        mixed $convert,
        mixed $id,
        mixed $contacts,
        mixed $caption,
    ): Response {
        return $this->connector->send(new SendVideoStatus($session, $file, $convert, $id, $contacts, $caption));
    }

    public function convertVideoToWhatsAppFormatMp4(string $session, mixed $url, mixed $data): Response
    {
        return $this->connector->send(new ConvertVideoToWhatsAppFormatMp4($session, $url, $data));
    }
}
