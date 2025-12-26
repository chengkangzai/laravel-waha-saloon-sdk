<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Refresh;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Refresh groups from the server.
 */
class RefreshGroupsFromTheServer extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/refresh";
    }

    public function __construct(
        protected string $session,
    ) {}
}
