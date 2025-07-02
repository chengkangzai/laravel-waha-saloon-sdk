<?php

namespace CCK\LaravelWahaSaloonSdk;

use CCK\LaravelWahaSaloonSdk\Commands\LaravelWahaSaloonSdkCommand;
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
            ->name('laravel-waha-saloon-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_waha_saloon_sdk_table')
            ->hasCommand(LaravelWahaSaloonSdkCommand::class);
    }
}
