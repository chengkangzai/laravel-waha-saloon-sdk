<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Passkey\ConfirmPasskeyPairing;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Passkey\GetPendingPasskeyChallenge;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Passkey\GetPendingPasskeyConfirmationCode;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Passkey\SubmitPasskeyAssertion;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Passkey extends Resource
{
    public function getPendingPasskeyChallenge(
        string $session,
    ): Response {
        return $this->connector->send(new GetPendingPasskeyChallenge($session));
    }

    public function submitPasskeyAssertion(
        string $session,
        string $id,
        string $rawId,
        string $type,
        array $assertionResponse,
    ): Response {
        return $this->connector->send(new SubmitPasskeyAssertion($session, $id, $rawId, $type, $assertionResponse));
    }

    public function getPendingPasskeyConfirmationCode(
        string $session,
    ): Response {
        return $this->connector->send(new GetPendingPasskeyConfirmationCode($session));
    }

    public function confirmPasskeyPairing(
        string $session,
    ): Response {
        return $this->connector->send(new ConfirmPasskeyPairing($session));
    }
}
