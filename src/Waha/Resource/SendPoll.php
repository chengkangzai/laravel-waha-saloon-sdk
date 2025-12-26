<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendPoll\SendPollWithOptions;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class SendPoll extends Resource
{
    public function sendPollWithOptions(mixed $chatId, mixed $poll, mixed $session, mixed $replyTo): Response
    {
        return $this->connector->send(new SendPollWithOptions($chatId, $poll, $session, $replyTo));
    }
}
