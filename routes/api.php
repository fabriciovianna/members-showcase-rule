<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatabaseSeederController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);
});




Route::group([
    'middleware' => 'api',
    'prefix' => 'artisan/seed/'
], function () {
    Route::post('members', [DatabaseSeederController::class, 'member']);
    Route::post('teams', [DatabaseSeederController::class, 'team']);
});
