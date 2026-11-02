<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\CheckNumberStatus\CheckNumberStatus as CheckNumberStatusRequest;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class CheckNumberStatus extends Resource
{
    /**
     * @param  null|string  $phone  The phone number to check
     *
     * @deprecated Use CheckExists\CheckPhoneNumberIsRegisteredInWhatsApp (GET /api/contacts/check-exists).
     */
    public function checkNumberStatus(?string $phone = null, ?string $session = null): Response
    {
        return $this->connector->send(new CheckNumberStatusRequest($phone, $session));
    }
}
