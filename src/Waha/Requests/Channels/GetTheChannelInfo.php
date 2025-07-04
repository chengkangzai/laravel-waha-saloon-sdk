<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the channel info
 */
class GetTheChannelInfo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels/{$this->id}";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
