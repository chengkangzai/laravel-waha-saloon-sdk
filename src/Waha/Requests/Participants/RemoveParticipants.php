<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Participants;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Remove participants
 */
class RemoveParticipants extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/participants/remove";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected mixed $participants = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['participants' => $this->participants]);
    }
}
