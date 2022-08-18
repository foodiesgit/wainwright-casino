<?php

namespace Wainwright\CasinoDog\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCasinoDog extends Command
{
    protected $signature = 'casino-dog:install';

    public $description = 'Install casino-dog to your Jetstream application.';

    public function handle(): int
    {
        // Views...
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views', resource_path('views/'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/components', resource_path('views/components'));

        //filament scafold
        // ln -s ../wainwright-casino/src/Filament ../../app/Filament

        return self::SUCCESS;
    }
}
