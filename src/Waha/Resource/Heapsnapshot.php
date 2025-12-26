<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Heapsnapshot\ReturnHeapsnapshotForTheCurrentNodejsProcess;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Heapsnapshot extends Resource
{
    public function returnHeapsnapshotForTheCurrentNodejsProcess(): Response
    {
        return $this->connector->send(new ReturnHeapsnapshotForTheCurrentNodejsProcess);
    }
}
