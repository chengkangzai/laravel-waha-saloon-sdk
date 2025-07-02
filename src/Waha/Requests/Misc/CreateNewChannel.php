<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a new channel.
 */
class CreateNewChannel extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels";
    }

    public function __construct(
        protected string $session,
        protected mixed $name = null,
        protected mixed $description = null,
        protected mixed $picture = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'description' => $this->description, 'picture' => $this->picture]);
    }
}
