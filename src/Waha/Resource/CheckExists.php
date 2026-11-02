<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\CheckExists\CheckPhoneNumberIsRegisteredInWhatsApp;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class CheckExists extends Resource
{
    /**
     * @param  null|string  $phone  The phone number to check
     */
    public function checkPhoneNumberIsRegisteredInWhatsApp(?string $phone = null, ?string $session = null): Response
    {
        return $this->connector->send(new CheckPhoneNumberIsRegisteredInWhatsApp($phone, $session));
    }
}
