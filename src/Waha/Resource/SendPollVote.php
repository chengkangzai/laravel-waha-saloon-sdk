<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendPollVote\VoteOnPoll;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class SendPollVote extends Resource
{
    public function voteOnPoll(
        mixed $chatId = null,
        mixed $pollMessageId = null,
        mixed $votes = null,
        mixed $session = null,
        mixed $pollServerId = null,
    ): Response {
        return $this->connector->send(new VoteOnPoll($chatId, $pollMessageId, $votes, $session, $pollServerId));
    }
}
