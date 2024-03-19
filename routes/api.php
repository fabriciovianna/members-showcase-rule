<?php

use App\Http\Controllers\{AuthController, DatabaseSeederController, EventController, MemberController, PreferenceController, TeamController};
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
    Route::post('preferences', [DatabaseSeederController::class, 'preference']);
    Route::post('events', [DatabaseSeederController::class, 'event']);
    Route::post('configs', [DatabaseSeederController::class, 'config']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function () {

    Route::group([
        'prefix' => '/team'
    ], function () {
        Route::get('/', [TeamController::class, 'index']);
        Route::get('/show/{team_id}', [TeamController::class, 'show']);
        Route::post('/create', [TeamController::class, 'create']);
        Route::put('/update/{team_id}', [TeamController::class, 'update']);
        Route::delete('/delete/{team_id}', [TeamController::class, 'delete']);
    });

    Route::group([
        'prefix' => '/member'
    ], function () {
        Route::get('/', [MemberController::class, 'index']);
        Route::get('/show/{member_id}', [MemberController::class, 'show']);
        Route::post('/create', [MemberController::class, 'create']);
        Route::put('/update/{member_id}', [MemberController::class, 'update']);
        Route::delete('/delete/{member_id}', [MemberController::class, 'delete']);
    });

    Route::group([
        'prefix' => '/event'
    ], function () {
        Route::get('/', [EventController::class, 'index']);
        Route::get('/show/{event_id}', [EventController::class, 'show']);
        Route::post('/create', [EventController::class, 'create']);
        Route::put('/update/{event_id}', [EventController::class, 'update']);
        Route::delete('/delete/{event_id}', [EventController::class, 'delete']);
    });

    Route::group([
        'prefix' => '/preference'
    ], function () {
        Route::get('/', [PreferenceController::class, 'index']);
        Route::get('/show/{preference_id}', [PreferenceController::class, 'show']);
        Route::post('/create', [PreferenceController::class, 'create']);
        Route::put('/update/{preference_id}', [PreferenceController::class, 'update']);
        Route::delete('/delete/{preference_id}', [PreferenceController::class, 'delete']);
    });
});
