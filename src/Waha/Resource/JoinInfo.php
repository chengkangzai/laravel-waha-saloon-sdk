<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\JoinInfo\GetInfoAboutTheGroupBeforeJoining;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class JoinInfo extends Resource
{
    /**
     * @param  string  $code  Group code (123) or url (https://chat.whatsapp.com/123)
     */
    public function getInfoAboutTheGroupBeforeJoining(string $session, ?string $code): Response
    {
        return $this->connector->send(new GetInfoAboutTheGroupBeforeJoining($session, $code));
    }
}
