<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Reject;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Reject incoming call
 */
class RejectIncomingCall extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/calls/reject";
    }

    /**
     * WAHA requires: $from, $id. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected string $session,
        protected mixed $from = null,
        protected mixed $id = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['from' => $this->from, 'id' => $this->id], fn ($value) => $value !== null);
    }
}
