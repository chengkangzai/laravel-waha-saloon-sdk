<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Reaction;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * React to a message with an emoji
 */
class ReactToMessageWithEmoji extends Request implements HasBody
{
    use HasJsonBody;

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
