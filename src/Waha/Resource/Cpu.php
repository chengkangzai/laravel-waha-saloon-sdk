<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Cpu\CollectAndReturnCpuProfileForTheCurrentNodejsProcess;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Cpu extends Resource
{
    /**
     * @param  string  $seconds  How many seconds to sample CPU
     */
    public function collectAndReturnCpuProfileForTheCurrentNodejsProcess(?string $seconds): Response
    {
        return $this->connector->send(new CollectAndReturnCpuProfileForTheCurrentNodejsProcess($seconds));
    }
}
