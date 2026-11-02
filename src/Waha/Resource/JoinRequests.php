<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\JoinRequests\ApprovePendingRequestsToJoinTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\JoinRequests\GetPendingRequestsToJoinTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\JoinRequests\RejectPendingRequestsToJoinTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class JoinRequests extends Resource
{
    public function getPendingRequestsToJoinTheGroup(
        string $session,
        string $id,
    ): Response {
        return $this->connector->send(new GetPendingRequestsToJoinTheGroup($session, $id));
    }

    public function approvePendingRequestsToJoinTheGroup(
        string $session,
        string $id,
        array $participants,
    ): Response {
        return $this->connector->send(new ApprovePendingRequestsToJoinTheGroup($session, $id, $participants));
    }

    public function rejectPendingRequestsToJoinTheGroup(
        string $session,
        string $id,
        array $participants,
    ): Response {
        return $this->connector->send(new RejectPendingRequestsToJoinTheGroup($session, $id, $participants));
    }
}
