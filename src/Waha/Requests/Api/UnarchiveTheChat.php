<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Api;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Unarchive the chat
 */
class UnarchiveTheChat extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}/unarchive";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
    ) {}
}
