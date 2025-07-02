<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Lids;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get lid by phone number (chat id)
 */
class GetLidByPhoneNumberChatId extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/lids/pn/{$this->phoneNumber}";
    }

    public function __construct(
        protected string $session,
        protected string $phoneNumber,
    ) {}
}
