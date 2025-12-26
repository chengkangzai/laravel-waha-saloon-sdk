<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Reaction;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * React to a message with an emoji
 */
class ReactToMessageWithEmoji extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/api/reaction';
    }

    public function __construct(
        protected mixed $messageId = null,
        protected mixed $reaction = null,
        protected mixed $session = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['messageId' => $this->messageId, 'reaction' => $this->reaction, 'session' => $this->session]);
    }
}
