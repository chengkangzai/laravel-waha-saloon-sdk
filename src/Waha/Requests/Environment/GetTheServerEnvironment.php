<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Environment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the server environment
 */
class GetTheServerEnvironment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/server/environment';
    }

    /**
     * @param  string|bool|null  $all  Include all environment variables
     */
    public function __construct(
        protected string|bool|null $all = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['all' => $this->all], fn ($value) => $value !== null);
    }
}
