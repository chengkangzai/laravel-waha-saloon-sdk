<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Delete\DeleteSentStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Delete extends Resource
{
    public function deleteSentStatus(string $session, mixed $id, mixed $contacts): Response
    {
        return $this->connector->send(new DeleteSentStatus($session, $id, $contacts));
    }
}
