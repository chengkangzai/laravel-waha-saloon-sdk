<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\V2;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get group participants.
 */
class GetGroupParticipants extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/participants/v2";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
