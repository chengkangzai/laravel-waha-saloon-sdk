<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Profile;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Set my profile name
 */
class SetMyProfileName extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/profile/name";
    }

    public function __construct(
        protected string $session,
        protected mixed $name = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name]);
    }
}
