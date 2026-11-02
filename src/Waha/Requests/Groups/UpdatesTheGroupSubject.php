<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Updates the group subject
 */
class UpdatesTheGroupSubject extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/subject";
    }

    /**
     * WAHA requires: $subject. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected string $session,
        protected string $id,
        protected mixed $subject = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['subject' => $this->subject], fn ($value) => $value !== null);
    }
}
