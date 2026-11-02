<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Reaction\ReactToMessageWithEmoji;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Reaction extends Resource
{
    public function reactToMessageWithEmoji(mixed $messageId = null, mixed $reaction = null, mixed $session = null): Response
    {
        return $this->connector->send(new ReactToMessageWithEmoji($messageId, $reaction, $session));
    }
}
