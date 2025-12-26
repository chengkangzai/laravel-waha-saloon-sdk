<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Cpu;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Collect and return a CPU profile for the current nodejs process
 */
class CollectAndReturnCpuProfileForTheCurrentNodejsProcess extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/server/debug/cpu';
    }

    /**
     * @param  null|string  $seconds  How many seconds to sample CPU
     */
    public function __construct(
        protected ?string $seconds = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['seconds' => $this->seconds]);
    }
}
