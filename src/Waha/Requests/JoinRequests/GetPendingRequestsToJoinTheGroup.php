<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\JoinRequests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get pending requests to join the group.
 */
class GetPendingRequestsToJoinTheGroup extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/participants/join-requests";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
