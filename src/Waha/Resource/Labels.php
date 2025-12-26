<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Labels\DeleteLabel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Labels\UpdateLabel;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Labels extends Resource
{
    public function updateLabel(string $session, string $labelId, mixed $name, mixed $colorHex, mixed $color): Response
    {
        return $this->connector->send(new UpdateLabel($session, $labelId, $name, $colorHex, $color));
    }

    public function deleteLabel(string $session, string $labelId): Response
    {
        return $this->connector->send(new DeleteLabel($session, $labelId));
    }
}
