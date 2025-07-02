<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Send;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Reply on a button message
 */
class ReplyOnButtonMessage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/send/buttons/reply';
    }

    public function __construct(
        protected mixed $chatId = null,
        protected mixed $selectedDisplayText = null,
        protected mixed $selectedButtonId = null,
        protected mixed $session = null,
        protected mixed $replyTo = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'selectedDisplayText' => $this->selectedDisplayText,
            'selectedButtonID' => $this->selectedButtonId,
            'session' => $this->session,
            'replyTo' => $this->replyTo,
        ]);
    }
}
