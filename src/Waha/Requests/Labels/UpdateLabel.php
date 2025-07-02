<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Labels;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update a label
 */
class UpdateLabel extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/labels/{$this->labelId}";
    }

    public function __construct(
        protected string $session,
        protected string $labelId,
        protected mixed $name = null,
        protected mixed $colorHex = null,
        protected mixed $color = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'colorHex' => $this->colorHex, 'color' => $this->color]);
    }
}
