<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Labels;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get chats by label
 */
class GetChatsByLabel extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/labels/{$this->labelId}/chats";
    }

    public function __construct(
        protected string $session,
        protected string $labelId,
    ) {}
}
