<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Profile;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get my profile
 */
class GetMyProfile extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/profile";
    }

    public function __construct(
        protected string $session,
    ) {}
}
