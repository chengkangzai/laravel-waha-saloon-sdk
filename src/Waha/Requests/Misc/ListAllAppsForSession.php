<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all apps for a session
 */
class ListAllAppsForSession extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/apps';
    }

    /**
     * @param  null|string  $session  Session name to list apps for
     */
    public function __construct(
        protected ?string $session = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['session' => $this->session]);
    }
}
