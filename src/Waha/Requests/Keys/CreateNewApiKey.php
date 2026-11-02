<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a new API key.
 */
class CreateNewApiKey extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/keys';
    }

    public function __construct(
        protected bool $isAdmin,
        protected ?string $session,
        protected bool $isActive,
        protected ?array $actions = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'isAdmin' => $this->isAdmin,
            'session' => $this->session,
            'isActive' => $this->isActive,
            'actions' => $this->actions,
        ], fn ($value) => $value !== null);
    }
}
