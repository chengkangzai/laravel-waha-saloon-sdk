<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\CheckExists\CheckPhoneNumberIsRegisteredInWhatsApp;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class CheckExists extends Resource
{
    /**
     * @param  string  $phone  The phone number to check
     */
    public function checkPhoneNumberIsRegisteredInWhatsApp(?string $phone, ?string $session): Response
    {
        return $this->connector->send(new CheckPhoneNumberIsRegisteredInWhatsApp($phone, $session));
    }
}
