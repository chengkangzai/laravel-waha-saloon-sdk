<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendLinkPreview;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Chatting Controller send Link Preview DEPRECATED
 */
class ChattingControllerSendLinkPreviewDeprecated extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendLinkPreview';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $session = null,
        protected mixed $url = null,
        protected mixed $title = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['chatId' => $this->chatId, 'session' => $this->session, 'url' => $this->url, 'title' => $this->title]);
    }
}
