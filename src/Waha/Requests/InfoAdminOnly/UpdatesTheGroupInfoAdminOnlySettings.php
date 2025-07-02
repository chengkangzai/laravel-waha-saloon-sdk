<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\InfoAdminOnly;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Updates the group "info admin only" settings.
 */
class UpdatesTheGroupInfoAdminOnlySettings extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/info-admin-only";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected mixed $adminsOnly = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['adminsOnly' => $this->adminsOnly]);
    }
}
