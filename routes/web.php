
<?php

use Illuminate\Support\Facades\Route;
use Wainwright\CasinoDog\Controllers\MarkdownParser;
use Wainwright\CasinoDog\Controllers\Game\SessionsHandler;

Route::middleware('web', 'throttle:2000,1')->group(function () {
Route::get('/entrySession', [SessionsHandler::class, 'entrySession']);

Route::middleware('auth:sanctum', 'throttle:2000,1')->group(function () {
Route::get('/markdown/random_snippets', [MarkdownParser::class, 'random_snippets'])->name('markdown.random_snippets');
Route::get('/session_handler', [SessionsHandler::class, 'test_handle']);
});
});