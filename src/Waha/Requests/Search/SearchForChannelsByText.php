<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Search;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Search for channels (by text)
 */
class SearchForChannelsByText extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels/search/by-text";
    }

    public function __construct(
        protected string $session,
        protected mixed $text = null,
        protected mixed $categories = null,
        protected mixed $limit = null,
        protected mixed $startCursor = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'text' => $this->text,
            'categories' => $this->categories,
            'limit' => $this->limit,
            'startCursor' => $this->startCursor,
        ]);
    }
}
