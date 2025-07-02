<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\MessagesAdminOnly;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get settings - who can send messages
 */
class GetSettingsWhoCanSendMessages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/settings/security/messages-admin-only";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
