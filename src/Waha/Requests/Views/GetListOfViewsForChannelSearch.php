<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Views;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get list of views for channel search
 */
class GetListOfViewsForChannelSearch extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels/search/views";
    }

    public function __construct(
        protected string $session,
    ) {}
}
