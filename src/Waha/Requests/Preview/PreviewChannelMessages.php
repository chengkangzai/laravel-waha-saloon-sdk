<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Preview;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Preview channel messages
 */
class PreviewChannelMessages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/channels/{$this->id}/messages/preview";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected ?string $downloadMedia = null,
        protected ?string $limit = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['downloadMedia' => $this->downloadMedia, 'limit' => $this->limit]);
    }
}
