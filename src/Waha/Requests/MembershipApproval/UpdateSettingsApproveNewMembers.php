<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\MembershipApproval;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update settings - approve new members.
 */
class UpdateSettingsApproveNewMembers extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/membership-approval";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected bool $newMembersApprovalRequired,
    ) {}

    public function defaultBody(): array
    {
        $isNotNull = fn ($value) => $value !== null;

        return array_filter([
            'newMembersApprovalRequired' => $this->newMembersApprovalRequired,
        ], $isNotNull);
    }
}
