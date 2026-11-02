<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete an API key.
 */
class DeleteApiKey extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/api/keys/{$this->id}";
    }

    public function __construct(
        protected string $id,
    ) {}
}
