<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send buttons (interactive message)
 */
class SendButtonsInteractiveMessage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendButtons';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $header = null,
        protected mixed $body = null,
        protected mixed $footer = null,
        protected mixed $buttons = null,
        protected mixed $session = null,
        protected mixed $headerImage = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'header' => $this->header,
            'body' => $this->body,
            'footer' => $this->footer,
            'buttons' => $this->buttons,
            'session' => $this->session,
            'headerImage' => $this->headerImage,
        ]);
    }
}
