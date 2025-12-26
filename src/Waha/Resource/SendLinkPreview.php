<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendLinkPreview\ChattingControllerSendLinkPreviewDeprecated;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendLinkPreview extends Resource
{
    public function chattingControllerSendLinkPreviewDeprecated(
        mixed $chatId,
        mixed $session,
        mixed $url,
        mixed $title,
    ): Response {
        return $this->connector->send(new ChattingControllerSendLinkPreviewDeprecated($chatId, $session, $url, $title));
    }
}
