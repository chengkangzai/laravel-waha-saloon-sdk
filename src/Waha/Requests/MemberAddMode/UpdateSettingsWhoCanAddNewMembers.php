<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\MemberAddMode;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update settings - who can add new members.
 */
class UpdateSettingsWhoCanAddNewMembers extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/member-add-mode";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected bool $membersCanAddNewMember,
    ) {}

    public function defaultBody(): array
    {
        $isNotNull = fn ($value) => $value !== null;

        return array_filter([
            'membersCanAddNewMember' => $this->membersCanAddNewMember,
        ], $isNotNull);
    }
}
