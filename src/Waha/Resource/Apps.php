<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps\DeleteApp;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps\GetAppById;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps\PurgeAppStorageById;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps\PurgeAppStorageByNameAndSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps\UpdateExistingApp;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Apps extends Resource
{
    public function getAppById(string $id): Response
    {
        return $this->connector->send(new GetAppById($id));
    }

    public function updateExistingApp(mixed $id = null, mixed $session = null, mixed $app = null, mixed $config = null, mixed $enabled = null): Response
    {
        return $this->connector->send(new UpdateExistingApp($id, $session, $app, $config, $enabled));
    }

    public function deleteApp(string $id): Response
    {
        return $this->connector->send(new DeleteApp($id));
    }

    public function purgeAppStorageById(
        string $id,
    ): Response {
        return $this->connector->send(new PurgeAppStorageById($id));
    }

    public function purgeAppStorageByNameAndSession(
        string $app,
        string $session,
    ): Response {
        return $this->connector->send(new PurgeAppStorageByNameAndSession($app, $session));
    }
}
