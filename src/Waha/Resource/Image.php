<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Image\SendImageStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Image extends Resource
{
    public function sendImageStatus(string $session, mixed $file = null, mixed $id = null, mixed $contacts = null, mixed $caption = null): Response
    {
        return $this->connector->send(new SendImageStatus($session, $file, $id, $contacts, $caption));
    }
}
