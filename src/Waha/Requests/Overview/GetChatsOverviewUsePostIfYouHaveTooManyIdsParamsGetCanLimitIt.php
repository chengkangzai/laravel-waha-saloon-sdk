<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Overview;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Get chats overview. Use POST if you have too many "ids" params - GET can limit it
 */
class GetChatsOverviewUsePostIfYouHaveTooManyIdsParamsGetCanLimitIt extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/overview";
    }

    /**
     * WAHA requires: $pagination. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected string $session,
        protected mixed $pagination = null,
        protected mixed $filter = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['pagination' => $this->pagination, 'filter' => $this->filter], fn ($value) => $value !== null);
    }
}
