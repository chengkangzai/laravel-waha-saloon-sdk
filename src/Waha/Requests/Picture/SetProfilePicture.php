<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Set profile picture
 */
class SetProfilePicture extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/profile/picture";
    }

    public function __construct(
        protected string $session,
        protected mixed $file = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['file' => $this->file]);
    }
}
