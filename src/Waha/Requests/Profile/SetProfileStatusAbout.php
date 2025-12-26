<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Profile;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Set profile status (About)
 */
class SetProfileStatusAbout extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/profile/status";
    }

    public function __construct(
        protected string $session,
        protected mixed $status = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['status' => $this->status]);
    }
}
