<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\MemberShareHistoryMode;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get settings - members can send message history to new members.
 */
class GetSettingsMembersCanShareHistory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/member-share-history-mode";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
