<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\MemberAddMode;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get settings - who can add new members.
 */
class GetSettingsWhoCanAddNewMembers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/member-add-mode";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
