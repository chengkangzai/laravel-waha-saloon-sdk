<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys\CreateNewApiKey;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys\CreateOrGetControlApiKey;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys\CreateOrGetMediaApiKey;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys\DeleteApiKey;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys\GetAllApiKeys;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys\UpdateApiKey;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Keys extends Resource
{
    public function createNewApiKey(
        bool $isAdmin,
        ?string $session,
        bool $isActive,
        ?array $actions = null,
    ): Response {
        return $this->connector->send(new CreateNewApiKey($isAdmin, $session, $isActive, $actions));
    }

    public function getAllApiKeys(
    ): Response {
        return $this->connector->send(new GetAllApiKeys);
    }

    public function createOrGetMediaApiKey(
        string $session,
    ): Response {
        return $this->connector->send(new CreateOrGetMediaApiKey($session));
    }

    public function createOrGetControlApiKey(
        string $session,
    ): Response {
        return $this->connector->send(new CreateOrGetControlApiKey($session));
    }

    public function updateApiKey(
        string $id,
        bool $isAdmin,
        ?string $session,
        bool $isActive,
        ?array $actions = null,
    ): Response {
        return $this->connector->send(new UpdateApiKey($id, $isAdmin, $session, $isActive, $actions));
    }

    public function deleteApiKey(
        string $id,
    ): Response {
        return $this->connector->send(new DeleteApiKey($id));
    }
}
