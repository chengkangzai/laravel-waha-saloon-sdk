<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get info about the group before joining.
 */
class GetInfoAboutTheGroupBeforeJoining extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/join-info";
    }

    /**
     * @param  null|string  $code  (Required) Group code (123) or url (https://chat.whatsapp.com/123)
     */
    public function __construct(
        protected string $session,
        protected ?string $code = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['code' => $this->code]);
    }
}
