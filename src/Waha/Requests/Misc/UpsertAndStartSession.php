<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Upsert and Start session
 *
 * @deprecated Use Misc\CreateSession and Start\StartTheSession.
 */
class UpsertAndStartSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sessions/start';
    }

    /**
     * WAHA requires: $name. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $name = null,
        protected mixed $sessionConfig = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'config' => $this->sessionConfig], fn ($value) => $value !== null);
    }
}
