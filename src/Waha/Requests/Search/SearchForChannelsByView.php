<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Search;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Search for channels (by view)
 */
class SearchForChannelsByView extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels/search/by-view";
    }

    public function __construct(
        protected string $session,
        protected mixed $view = null,
        protected mixed $countries = null,
        protected mixed $categories = null,
        protected mixed $limit = null,
        protected mixed $startCursor = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'view' => $this->view,
            'countries' => $this->countries,
            'categories' => $this->categories,
            'limit' => $this->limit,
            'startCursor' => $this->startCursor,
        ]);
    }
}
