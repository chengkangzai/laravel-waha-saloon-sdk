<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a new group.
 */
class CreateNewGroup extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups";
    }

    /**
     * WAHA requires: $name, $participants. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected string $session,
        protected mixed $name = null,
        protected mixed $participants = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'participants' => $this->participants], fn ($value) => $value !== null);
    }
}
