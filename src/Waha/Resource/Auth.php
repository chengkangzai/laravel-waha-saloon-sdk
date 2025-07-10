<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Auth\GetQrCodeForPairingWhatsAppApi;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Auth\RequestAuthenticationCode;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Auth extends Resource
{
    /**
     * @param  string  $format  (Required)
     */
    public function getQrCodeForPairingWhatsAppApi(string $session, ?string $format): Response
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

    public function requestAuthenticationCode(string $session, mixed $phoneNumber, mixed $method): Response
    {
        return $this->connector->send(new RequestAuthenticationCode($session, $phoneNumber, $method));
    }
}
