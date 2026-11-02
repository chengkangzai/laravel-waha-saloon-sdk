<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Mcp;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send an MCP protocol request.
 */
class SendMcpRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/mcp';
    }

    /**
     * The OpenAPI document leaves the protocol payload unspecified.
     *
     * @param  array<string, mixed>  $payload  JSON protocol payload.
     */
    public function __construct(
        protected array $payload = [],
    ) {}

    public function defaultBody(): array
    {
        return array_filter($this->payload, fn ($value) => $value !== null);
    }
}
