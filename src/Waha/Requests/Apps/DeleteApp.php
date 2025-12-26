<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete an app
 */
class DeleteApp extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/api/apps/{$this->id}";
    }

    public function __construct(
        protected string $id,
    ) {}
}
