<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Image\SendImageStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Image extends Resource
{
    public function sendImageStatus(string $session, mixed $file, mixed $id, mixed $contacts, mixed $caption): Response
    {
        return $this->connector->send(new SendImageStatus($session, $file, $id, $contacts, $caption));
    }
}
