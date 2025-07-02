<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Groups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Updates the group description.
 */
class UpdatesTheGroupDescription extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/description";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected mixed $description = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['description' => $this->description]);
    }
}
