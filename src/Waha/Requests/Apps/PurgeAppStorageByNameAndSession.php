<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Purge app storage by app name and session.
 */
class PurgeAppStorageByNameAndSession extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/apps/{$this->app}/{$this->session}/purge";
    }

    public function __construct(
        protected string $app,
        protected string $session,
    ) {}
}
