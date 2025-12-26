<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendPollVote\VoteOnPoll;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class SendPollVote extends Resource
{
    public function voteOnPoll(
        mixed $chatId,
        mixed $pollMessageId,
        mixed $votes,
        mixed $session,
        mixed $pollServerId,
    ): Response {
        return $this->connector->send(new VoteOnPoll($chatId, $pollMessageId, $votes, $session, $pollServerId));
    }
}
