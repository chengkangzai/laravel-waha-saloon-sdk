<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\InfoAdminOnly;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the group's 'info admin only' settings.
 */
class GetTheGroupInfoAdminOnlySettings extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/info-admin-only";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
