<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update an existing app
 */
class UpdateExistingApp extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/apps/{$this->id}";
    }

    /**
     * WAHA requires: $id, $session, $app, $appConfig. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $id = null,
        protected mixed $session = null,
        protected mixed $app = null,
        protected mixed $appConfig = null,
        protected mixed $enabled = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'id' => $this->id,
            'session' => $this->session,
            'app' => $this->app,
            'config' => $this->appConfig,
            'enabled' => $this->enabled,
        ], fn ($value) => $value !== null);
    }
}
