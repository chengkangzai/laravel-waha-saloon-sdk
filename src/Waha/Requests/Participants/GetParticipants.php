<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Participants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get participants
 */
class GetParticipants extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/participants";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
