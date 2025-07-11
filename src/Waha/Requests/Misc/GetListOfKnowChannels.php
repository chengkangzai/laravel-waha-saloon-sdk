<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get list of know channels
 */
class GetListOfKnowChannels extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels";
    }

    public function __construct(
        protected string $session,
        protected ?string $role = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['role' => $this->role]);
    }
}
