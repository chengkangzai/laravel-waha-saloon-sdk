<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\MemberShareHistoryMode;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update settings - members can send message history to new members.
 */
class UpdateSettingsMembersCanShareHistory extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/member-share-history-mode";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected bool $membersCanShareHistory,
    ) {}

    public function defaultBody(): array
    {
        $isNotNull = fn ($value) => $value !== null;

        return array_filter([
            'membersCanShareHistory' => $this->membersCanShareHistory,
        ], $isNotNull);
    }
}
