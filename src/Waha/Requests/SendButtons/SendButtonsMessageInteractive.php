<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendButtons;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send buttons message (interactive)
 *
 * @deprecated Use SendList\SendListMessageInteractive or SendText\SendTextMessage.
 */
class SendButtonsMessageInteractive extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendButtons';
    }

    /**
     * WAHA requires: $chatId, $header, $messageBody, $footer, $buttons, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $chatId = null,
        protected mixed $header = null,
        protected mixed $messageBody = null,
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
            'body' => $this->messageBody,
            'footer' => $this->footer,
            'buttons' => $this->buttons,
            'session' => $this->session,
            'headerImage' => $this->headerImage,
        ], fn ($value) => $value !== null);
    }
}
