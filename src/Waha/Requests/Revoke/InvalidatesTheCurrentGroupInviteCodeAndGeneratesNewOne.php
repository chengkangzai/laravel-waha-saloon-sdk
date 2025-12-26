<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Revoke;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Invalidates the current group invite code and generates a new one.
 */
class InvalidatesTheCurrentGroupInviteCodeAndGeneratesNewOne extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/invite-code/revoke";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
