<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a session
 */
class CreateSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sessions';
    }

    public function __construct(
        protected mixed $name = null,
        protected ?array $apps = null,
        protected ?bool $start = null,
        protected ?array $sessionConfig = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'apps' => $this->apps,
            'start' => $this->start,
            'config' => $this->sessionConfig,
        ], fn ($value) => $value !== null);
    }
}
