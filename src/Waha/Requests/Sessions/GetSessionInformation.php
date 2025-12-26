<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get session information
 */
class GetSessionInformation extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/sessions/{$this->session}";
    }

    /**
     * @param  null|string  $expand  Expand additional session details.
     * @param  null|string  $expand  Expand additional session details.
     */
    public function __construct(
        protected string $session,
        protected ?string $expand = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['expand' => $this->expand]);
    }
}
