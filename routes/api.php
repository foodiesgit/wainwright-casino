<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Wainwright\CasinoDog\Controllers\Game\SessionsHandler;
use Wainwright\CasinoDog\Controllers\APIController;

Route::middleware('api', 'throttle:500,1')->prefix('api')->group(function () {
        Route::get('/createSession', [APIController::class, 'createSessionEndpoint']);
        ##Route::get('/callback/evoplay', [EndpointRouter::class, 'evoplayCallbackEndpoint']);
});

/*
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Respins\BaseFunctions\Controllers\API\SessionController;
use Respins\BaseFunctions\Controllers\API\MockController;
use Respins\BaseFunctions\Controllers\Game\BlueoceanController;
use Respins\BaseFunctions\Controllers\EndpointRouter;
use Respins\BaseFunctions\Controllers\DataController;
use Respins\BaseFunctions\Controllers\Data\GameImporterController;
use Respins\BaseFunctions\Controllers\FrontendController;
use Respins\BaseFunctions\Controllers\Admin\AdminPageController;
use Respins\BaseFunctions\BaseFunctions;
use Respins\BaseFunctions\Controllers\Livewire\GamesLauncher;
use Respins\BaseFunctions\Controllers\Livewire\GamesListComponent;
use Respins\BaseFunctions\Controllers\Livewire\MaintenancePanel;
use Respins\BaseFunctions\Controllers\Livewire\OperatorPanel;
use Respins\BaseFunctions\Controllers\Livewire\MockPanel;
use Respins\BaseFunctions\Controllers\SeleniumController;
# If using system across different domains/hosts or productional, make sure to read general explaination regarding laravel routing/mw:
# Laravel Middleware @ https://laravel.com/docs/9.x/middleware
Route::middleware('api', 'throttle:500,1')->prefix('api/respins.io')->group(function () {

    ## Data group
    Route::group(['namespace' => 'data', 'prefix' => 'data'], function() {
        ##Route::get('/game-importer', [GameImporterController::class, 'gamelistImporter']);
    });
    ## Game aggregation group
    Route::group(['namespace' => 'aggregation', 'prefix' => 'aggregation'], function() {
        Route::get('/createSession', [EndpointRouter::class, 'createSessionEndpoint']);
        ##Route::get('/callback/evoplay', [EndpointRouter::class, 'evoplayCallbackEndpoint']);
    });

    ##Route::group(['namespace' => 'mock', 'prefix' => 'mock'], function() {
    ##    Route::get('/callback', [MockController::class, 'mockRouter'])->name('mock-callback');
    ##});

    Route::group(['namespace' => 'testing', 'prefix' => 'testing'], function() {
        Route::get('/test_selenium', [SeleniumController::class, 'test_basic_example']);
        Route::get('/build_list', [DataController::class, 'test_gameslist']);


        Route::get('/generate_pragmatic_real_token', [DataController::class, 'generate_pragmatic_real_token']);
    });
});

# Web routes send session/user/auth details and extended headers (like to catch user agent to proxy on the session request)
Route::middleware('web', 'throttle:2000,1')->prefix('web/respins.io')->group(function () {
    ## Livewire
    Route::get('/games/error', [FrontendController::class, 'gameErrorPage']);
    Route::get('/games/launch/{slug}', GamesLauncher::class);


## Auth required group (mainly for panel purposes)
## Specify the super admin in configuration, by default first registered user
Route::middleware('auth:sanctum', 'throttle:2000,1')->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'indexGames'])->name('dashboard');
    Route::get('/games/launch/{slug}', GamesLauncher::class);
    Route::get('/games/list', GamesListComponent::class)->name('gameslist');
    Route::get('/maintenance-panel', MaintenancePanel::class)->name('maintenance-panel');
    Route::get('/operator-panel', OperatorPanel::class)->name('operator-panel');
    Route::get('/mock-panel', MockPanel::class)->name('mock-panel');
});
    ## Game Entry
    Route::get('/entrySession', [SessionController::class, 'entrySession']);

});
*/