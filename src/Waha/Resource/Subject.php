<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Subject\UpdatesTheGroupSubject;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Subject extends Resource
{
    public function updatesTheGroupSubject(string $session, string $id, mixed $subject): Response
    {
        return $this->connector->send(new UpdatesTheGroupSubject($session, $id, $subject));
    }
}
