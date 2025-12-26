<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\CheckNumberStatus\CheckNumberStatus as CheckNumberStatusRequest;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class CheckNumberStatus extends Resource
{
    /**
     * @param  string  $phone  The phone number to check
     */
    public function checkNumberStatus(?string $phone, ?string $session): Response
    {
        return $this->connector->send(new CheckNumberStatusRequest($phone, $session));
    }
}
