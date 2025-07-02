<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Set group picture
 */
class SetGroupPicture extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/picture";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected mixed $file = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['file' => $this->file]);
    }
}
