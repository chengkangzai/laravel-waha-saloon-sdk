<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Labels;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a label
 */
class DeleteLabel extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/labels/{$this->labelId}";
    }

    public function __construct(
        protected string $session,
        protected string $labelId,
    ) {}
}
