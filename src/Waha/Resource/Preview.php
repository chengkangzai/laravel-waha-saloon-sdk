<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Preview\PreviewChannelMessages;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Preview extends Resource
{
    public function previewChannelMessages(string $session, string $id, ?string $downloadMedia, ?string $limit): Response
    {
        return $this->connector->send(new PreviewChannelMessages($session, $id, $downloadMedia, $limit));
    }
}
