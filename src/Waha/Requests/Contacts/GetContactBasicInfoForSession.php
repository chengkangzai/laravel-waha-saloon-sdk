<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get contact basic info.
 */
class GetContactBasicInfoForSession extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/contacts/{$this->id}";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
