<?php

namespace CCK\LaravelWahaSaloonSdk;

use CCK\LaravelWahaSaloonSdk\Waha\Waha;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelWahaSaloonSdkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('waha-saloon-sdk')
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        // Register WahaManager as singleton
        $this->app->singleton(WahaManager::class, function ($app) {
            return new WahaManager(
                config: $app['config']['waha-saloon-sdk'] ?? [],
            );
        });

        // Alias for convenience
        $this->app->alias(WahaManager::class, 'waha');

        // Bind Waha connector to resolve the default connection
        $this->app->bind(Waha::class, function ($app) {
            return $app->make(WahaManager::class)->connection();
        });
    }
}
