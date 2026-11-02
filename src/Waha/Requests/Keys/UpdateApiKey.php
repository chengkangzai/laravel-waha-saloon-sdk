<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update an API key.
 */
class UpdateApiKey extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/keys/{$this->id}";
    }

    public function __construct(
        protected string $id,
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
