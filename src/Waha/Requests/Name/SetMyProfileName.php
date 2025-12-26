<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Name;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Set my profile name
 */
class SetMyProfileName extends Request implements HasBody
{
    use HasJsonBody;

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
