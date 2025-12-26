<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\MessagesAdminOnly;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update settings - who can send messages
 */
class UpdateSettingsWhoCanSendMessages extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/messages-admin-only";
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
