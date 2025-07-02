<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the group.
 */
class GetTheGroup extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
