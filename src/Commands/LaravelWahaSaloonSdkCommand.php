<?php

namespace CCK\LaravelWahaSaloonSdk\Commands;

use Illuminate\Console\Command;

class LaravelWahaSaloonSdkCommand extends Command
{
    public $signature = 'laravel-waha-saloon-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
