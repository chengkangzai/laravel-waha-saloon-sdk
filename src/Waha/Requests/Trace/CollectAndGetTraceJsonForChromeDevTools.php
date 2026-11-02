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
     * WAHA requires: $seconds, $categories. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     *
     * @param  string|int|float|null  $seconds  How many seconds to trace
     * @param  string|array|null  $categories  Categories to trace (all by default)
     */
    public function __construct(
        protected string $session,
        protected string|int|float|null $seconds = null,
        protected string|array|null $categories = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['seconds' => $this->seconds, 'categories' => $this->categories], fn ($value) => $value !== null);
    }
}
