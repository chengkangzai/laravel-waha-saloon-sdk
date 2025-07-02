<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete the channel.
 */
class DeleteTheChannel extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels/{$this->id}";
    }

    public function __construct(
        protected string $session,
        protected string $id,
    ) {}
}
