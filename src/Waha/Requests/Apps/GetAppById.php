<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get app by ID
 */
class GetAppById extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/apps/{$this->id}";
    }

    public function __construct(
        protected string $id,
    ) {}
}
