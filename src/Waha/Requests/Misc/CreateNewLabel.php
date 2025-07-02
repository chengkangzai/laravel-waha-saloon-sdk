<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a new label
 */
class CreateNewLabel extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/labels";
    }

    public function __construct(
        protected string $session,
        protected mixed $name = null,
        protected mixed $colorHex = null,
        protected mixed $color = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'colorHex' => $this->colorHex, 'color' => $this->color]);
    }
}
