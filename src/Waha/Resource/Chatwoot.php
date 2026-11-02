<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chatwoot\ChatwootWebhook;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Chatwoot extends Resource
{
    /**
     * @param  array<string, mixed>  $payload  JSON protocol payload.
     */
    public function chatwootWebhook(
        string $session,
        string $id,
        array $payload = [],
    ): Response {
        return $this->connector->send(new ChatwootWebhook($session, $id, $payload));
    }
}
