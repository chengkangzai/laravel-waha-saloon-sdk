<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Trace;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Collect and get a trace.json for Chrome DevTools
 */
class CollectAndGetTraceJsonForChromeDevTools extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/server/debug/browser/trace/{$this->session}";
    }

    /**
     * @param  null|string  $seconds  How many seconds to trace
     * @param  null|string  $categories  Categories to trace (all by default)
     */
    public function __construct(
        protected string $session,
        protected ?string $seconds = null,
        protected ?string $categories = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['seconds' => $this->seconds, 'categories' => $this->categories]);
    }
}
