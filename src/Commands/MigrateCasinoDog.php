<?php

namespace Wainwright\CasinoDog\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MigrateCasinoDog extends Command
{
    protected $signature = 'casino-dog:migrate';

    public $description = 'Publish all migrations to your Jetstream application & run migrate.';

    public function handle(): int
    {
        // Views...
        \Artisan::call('vendor:publish --tag="casino-dog-migrations"');
        \Artisan::call('migrate');

        return self::SUCCESS;
    }




}
