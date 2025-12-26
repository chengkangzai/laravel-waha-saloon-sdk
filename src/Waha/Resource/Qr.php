<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Qr\GetQrCodeForPairingWhatsAppApi;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Qr extends Resource
{
    public function getQrCodeForPairingWhatsAppApi(string $session, ?string $format): Response
    {
        return $this->connector->send(new GetQrCodeForPairingWhatsAppApi($session, $format));
    }
}
