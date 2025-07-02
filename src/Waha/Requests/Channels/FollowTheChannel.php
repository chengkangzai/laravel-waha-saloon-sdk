<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Follow the channel.
 */
class FollowTheChannel extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels/{$this->id}/follow";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
