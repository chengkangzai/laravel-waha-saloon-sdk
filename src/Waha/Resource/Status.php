<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\DeleteSentStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\GenerateMessageIdYouCanUseToBatchContacts;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\SendImageStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\SendTextStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\SendVideoStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\SendVoiceStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Status extends Resource
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

    public function sendImageStatus(string $session, mixed $file, mixed $id, mixed $contacts, mixed $caption): Response
    {
        return $this->connector->send(new SendImageStatus($session, $file, $id, $contacts, $caption));
    }

    public function sendVoiceStatus(
        string $session,
        mixed $file,
        mixed $backgroundColor,
        mixed $id,
        mixed $contacts,
    ): Response {
        return $this->connector->send(new SendVoiceStatus($session, $file, $backgroundColor, $id, $contacts));
    }

    public function sendVideoStatus(string $session, mixed $file, mixed $id, mixed $contacts, mixed $caption): Response
    {
        return $this->connector->send(new SendVideoStatus($session, $file, $id, $contacts, $caption));
    }

    public function deleteSentStatus(string $session, mixed $id, mixed $contacts): Response
    {
        return $this->connector->send(new DeleteSentStatus($session, $id, $contacts));
    }

    public function generateMessageIdYouCanUseToBatchContacts(string $session): Response
    {
        return $this->connector->send(new GenerateMessageIdYouCanUseToBatchContacts($session));
    }
}
