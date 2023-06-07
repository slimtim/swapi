<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PlanetController;
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

Route::get('/people/luke-skywalker', [PersonController::class, 'lukeSkywalker']);
Route::get('/films/episode-1', [FilmController::class, 'episode1']);
Route::get('/planets/galaxy', [PlanetController::class, 'galaxy']);

