<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Purge app storage by app ID.
 */
class PurgeAppStorageById extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/apps/{$this->id}/purge";
    }

    public function __construct(
        protected string $id,
    ) {}
}
