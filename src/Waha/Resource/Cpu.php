<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Cpu\CollectAndReturnCpuProfileForTheCurrentNodejsProcess;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Cpu extends Resource
{
    /**
     * @param  string|int|float|null  $seconds  How many seconds to sample CPU
     */
    public function collectAndReturnCpuProfileForTheCurrentNodejsProcess(string|int|float|null $seconds = null): Response
    {
        return $this->connector->send(new CollectAndReturnCpuProfileForTheCurrentNodejsProcess($seconds));
    }
}
