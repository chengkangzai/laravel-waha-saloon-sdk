<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Qr\GetQrCodeForPairingWhatsAppApi;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Qr extends Resource
{
    public function getQrCodeForPairingWhatsAppApi(string $session, ?string $format = null): Response
    {
        return $this->connector->send(new GetQrCodeForPairingWhatsAppApi($session, $format));
    }

    public function getQrCodeImage(string $session): Response
    {
        return $this->connector->send(GetQrCodeForPairingWhatsAppApi::forBinaryImage($session));
    }

    public function getQrCodeBase64(string $session): Response
    {
        return $this->connector->send(GetQrCodeForPairingWhatsAppApi::forBase64Image($session));
    }

    public function getQrCodeRaw(string $session): Response
    {
        return $this->connector->send(GetQrCodeForPairingWhatsAppApi::forRawValue($session));
    }
}
