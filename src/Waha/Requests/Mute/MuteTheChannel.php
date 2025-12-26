<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Mute;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Mute the channel.
 */
class MuteTheChannel extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels/{$this->id}/mute";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
