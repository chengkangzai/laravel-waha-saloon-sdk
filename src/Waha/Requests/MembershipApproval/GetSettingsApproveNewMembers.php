<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\MembershipApproval;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get settings - approve new members.
 */
class GetSettingsApproveNewMembers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/membership-approval";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
