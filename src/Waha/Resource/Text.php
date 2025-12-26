<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Text\SendTextStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Text extends Resource
{
    public function sendTextStatus(
        string $session,
        mixed $text,
        mixed $backgroundColor,
        mixed $font,
        mixed $id,
        mixed $contacts,
        mixed $linkPreview,
        mixed $linkPreviewHighQuality,
    ): Response {
        return $this->connector->send(new SendTextStatus($session, $text, $backgroundColor, $font, $id, $contacts, $linkPreview, $linkPreviewHighQuality));
    }
}
