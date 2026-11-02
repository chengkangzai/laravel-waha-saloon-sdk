<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all sessions
 */
class ListAllSessions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/sessions';
    }

    /**
     * @param  string|array|null  $expand  Expand additional session details.
     * @param  string|bool|null  $all  Return all sessions, including those that are in the STOPPED state.
     */
    public function __construct(
        protected string|array|null $expand = null,
        protected string|bool|null $all = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['expand' => $this->expand, 'all' => $this->all], fn ($value) => $value !== null);
    }
}
