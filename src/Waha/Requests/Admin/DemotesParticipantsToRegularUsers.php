<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Admin;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Demotes participants to regular users.
 */
class DemotesParticipantsToRegularUsers extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/admin/demote";
    }

    /**
     * WAHA requires: $participants. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected string $session,
        protected string $id,
        protected mixed $participants = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['participants' => $this->participants], fn ($value) => $value !== null);
    }
}
