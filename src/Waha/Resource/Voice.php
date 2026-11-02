<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Voice\ConvertVoiceToWhatsAppFormatOpus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Voice\SendVoiceStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Voice extends Resource
{
    public function sendVoiceStatus(
        string $session,
        mixed $file = null,
        mixed $convert = null,
        mixed $backgroundColor = null,
        mixed $id = null,
        mixed $contacts = null,
    ): Response {
        return $this->connector->send(new SendVoiceStatus($session, $file, $convert, $backgroundColor, $id, $contacts));
    }

    public function convertVoiceToWhatsAppFormatOpus(string $session, mixed $url = null, mixed $data = null): Response
    {
        return $this->connector->send(new ConvertVoiceToWhatsAppFormatOpus($session, $url, $data));
    }
}
