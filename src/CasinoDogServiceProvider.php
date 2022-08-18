<?php

namespace Wainwright\CasinoDog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Wainwright\CasinoDog\Commands\InstallCasinoDog;
use Wainwright\CasinoDog\Commands\MigrateCasinoDog;
use Filament\PluginServiceProvider;
use Livewire\Livewire;

class CasinoDogServiceProvider extends PluginServiceProvider
{
    protected array $beforeCoreScripts = [
        'my-package-scripts' => __DIR__ . '/../stubs/filament/js.js',
    ];

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('casino-dog')
            ->hasConfigFile()
            ->hasRoutes(['web', 'api'])
            ->hasViews('wainwright')
            ->hasMigrations(['modify_users_table', 'create_datalogger_table', 'create_gameslist_table', 'create_metadata_table', 'create_parent_sessions', 'create_rawgameslist_table', 'create_operatoraccess_table'])
            ->hasCommands(InstallCasinoDog::class, MigrateCasinoDog::class);

        $this->loadLivewireComponents();
    }


    private function loadLivewireComponents()
    {
        /*
         * Livewire Components
         *
         * Following components can be called anywhere in your code by "@livewire('component-name')"

        Livewire::component('navigation-bar', \Respins\BaseFunctions\Controllers\Livewire\NavigationBar::class);
        Livewire::component('games-launcher', \Respins\BaseFunctions\Controllers\Livewire\GamesLauncher::class);
        Livewire::component('games-list', \Respins\BaseFunctions\Controllers\Livewire\GamesList::class);
        Livewire::component('maintenance-clear-cache', \Respins\BaseFunctions\Controllers\Livewire\MaintenancePanel::class);
        Livewire::component('user-datatable', \Respins\BaseFunctions\Controllers\Livewire\Partials\UserDataTable::class);
        Livewire::component('gamesessions-datatable', \Respins\BaseFunctions\Controllers\Livewire\Partials\GameSessionsDataTable::class);
        Livewire::component('gameslist-datatable', \Respins\BaseFunctions\Controllers\Livewire\Partials\GamesListDataTable::class);
        Livewire::component('operatorkeys-datatable', \Respins\BaseFunctions\Controllers\Livewire\Partials\OperatorKeysDataTable::class);
        Livewire::component('operator-panel', \Respins\BaseFunctions\Controllers\Livewire\OperatorPanel::class);
        Livewire::component('mock-panel', \Respins\BaseFunctions\Controllers\Livewire\MockPanel::class);
        Livewire::component('gamelist-importer-form', \Respins\BaseFunctions\Controllers\Livewire\Partials\GameImporterForm::class);
         */
        Livewire::component('operator-keys', \Wainwright\CasinoDog\Controllers\Livewire\OperatorKeys::class);
        Livewire::component('form-actions', \Wainwright\CasinoDog\Controllers\Livewire\FormActions::class);
        Livewire::component('overview-page', \Wainwright\CasinoDog\Controllers\Livewire\OverviewPage::class);
        Livewire::component('landing-page', \Wainwright\CasinoDog\Controllers\Livewire\LandingPage::class);
        Livewire::component('notification-alert-banner', \Wainwright\CasinoDog\Controllers\Livewire\AlertBanner::class);

        /*
         * Filament components
         */
        Livewire::component('fila-game-frame', \Wainwright\CasinoDog\Filament\Filawire\FilaGameFrame::class);
        Livewire::component('fila-games-overview', \Wainwright\CasinoDog\Filament\Filawire\FilaGamesOverview::class);


    }

}
