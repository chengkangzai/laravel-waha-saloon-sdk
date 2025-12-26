<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Subscribe;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Subscribe to presence events for the chat.
 */
class SubscribeToPresenceEventsForTheChat extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/presence/{$this->chatId}/subscribe";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
    ) {}
}
