<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Voice\ConvertVoiceToWhatsAppFormatOpus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Voice\SendVoiceStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Voice extends Resource
{
    public function sendVoiceStatus(
        string $session,
        mixed $file,
        mixed $convert,
        mixed $backgroundColor,
        mixed $id,
        mixed $contacts,
    ): Response {
        return $this->connector->send(new SendVoiceStatus($session, $file, $convert, $backgroundColor, $id, $contacts));
    }

    public function convertVoiceToWhatsAppFormatOpus(string $session, mixed $url, mixed $data): Response
    {
        return $this->connector->send(new ConvertVoiceToWhatsAppFormatOpus($session, $url, $data));
    }
}
