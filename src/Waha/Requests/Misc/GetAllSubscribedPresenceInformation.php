<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get all subscribed presence information.
 */
class GetAllSubscribedPresenceInformation extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/presence";
    }

    public function __construct(
        protected string $session,
    ) {}
}
