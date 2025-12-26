<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Screenshot\ScreenshotControllerScreenshot;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Screenshot extends Resource
{
    public function screenshotControllerScreenshot(?string $session): Response
    {
        return $this->connector->send(new ScreenshotControllerScreenshot($session));
    }
}
