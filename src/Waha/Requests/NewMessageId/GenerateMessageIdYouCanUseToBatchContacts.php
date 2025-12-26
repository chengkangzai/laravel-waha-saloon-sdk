<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\NewMessageId;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Generate message ID you can use to batch contacts
 */
class GenerateMessageIdYouCanUseToBatchContacts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/status/new-message-id";
    }

    public function __construct(
        protected string $session,
    ) {}
}
