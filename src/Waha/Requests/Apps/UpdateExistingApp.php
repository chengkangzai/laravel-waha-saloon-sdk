<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update an existing app
 */
class UpdateExistingApp extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/apps/{$this->id}";
    }

    /**
     * @param  string  $id
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
        ]);
    }
}
