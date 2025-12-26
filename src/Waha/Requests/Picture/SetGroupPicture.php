<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Set group picture
 */
class SetGroupPicture extends Request implements HasBody
{
    use HasJsonBody;

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
