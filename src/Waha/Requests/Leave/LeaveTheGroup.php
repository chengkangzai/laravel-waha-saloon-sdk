<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Leave;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Leave the group.
 */
class LeaveTheGroup extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/leave";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
