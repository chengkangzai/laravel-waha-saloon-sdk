<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendPoll\SendPollWithOptions;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendPoll extends Resource
{
    public function sendPollWithOptions(mixed $chatId = null, mixed $poll = null, mixed $session = null, mixed $replyTo = null, ?string $id = null): Response
    {
        return $this->connector->send(new SendPollWithOptions($chatId, $poll, $session, $replyTo, $id));
    }
}
