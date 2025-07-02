<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\InviteCode;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Gets the invite code for the group.
 */
class GetsTheInviteCodeForTheGroup extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/invite-code";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
