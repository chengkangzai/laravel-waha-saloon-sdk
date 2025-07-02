<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Lids;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get phone number by lid
 */
class GetPhoneNumberByLid extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/lids/{$this->lid}";
    }

    public function __construct(
        protected string $session,
        protected string $lid,
    ) {}
}
