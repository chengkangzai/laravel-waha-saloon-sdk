<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Text\SendTextStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Text extends Resource
{
    public function sendTextStatus(
        string $session,
        mixed $text = null,
        mixed $backgroundColor = null,
        mixed $font = null,
        mixed $id = null,
        mixed $contacts = null,
        mixed $linkPreview = null,
        mixed $linkPreviewHighQuality = null,
    ): Response {
        return $this->connector->send(new SendTextStatus($session, $text, $backgroundColor, $font, $id, $contacts, $linkPreview, $linkPreviewHighQuality));
    }
}
