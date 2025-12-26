<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a new app
 */
class CreateNewApp extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/apps';
    }

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
