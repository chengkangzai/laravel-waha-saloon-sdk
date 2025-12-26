<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Reaction\ReactToMessageWithEmoji;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Reaction extends Resource
{
    public function reactToMessageWithEmoji(mixed $messageId, mixed $reaction, mixed $session): Response
    {
        return $this->connector->send(new ReactToMessageWithEmoji($messageId, $reaction, $session));
    }
}
