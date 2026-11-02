<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendLinkPreview\ChattingControllerSendLinkPreviewDeprecated;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendLinkPreview extends Resource
{
    /**
     * @deprecated Use LinkCustomPreview\SendTextMessageWithCustomLinkPreview.
     */
    public function chattingControllerSendLinkPreviewDeprecated(
        mixed $chatId = null,
        mixed $session = null,
        mixed $url = null,
        mixed $title = null,
        ?string $id = null,
    ): Response {
        return $this->connector->send(new ChattingControllerSendLinkPreviewDeprecated($chatId, $session, $url, $title, $id));
    }
}
