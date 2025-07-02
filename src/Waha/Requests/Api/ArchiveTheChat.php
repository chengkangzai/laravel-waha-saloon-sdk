<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Api;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Archive the chat
 */
class ArchiveTheChat extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}/archive";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
    ) {}
}
