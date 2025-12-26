<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps\DeleteApp;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps\GetAppById;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Apps\UpdateExistingApp;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Apps extends Resource
{
    public function getAppById(string $id): Response
    {
        return $this->connector->send(new GetAppById($id));
    }

    /**
     * @param  string  $id
     */
    public function updateExistingApp(mixed $id, mixed $session, mixed $app, mixed $config, mixed $enabled): Response
    {
        return $this->connector->send(new UpdateExistingApp($id, $id, $session, $app, $config, $enabled));
    }

    public function deleteApp(string $id): Response
    {
        return $this->connector->send(new DeleteApp($id));
    }
}
