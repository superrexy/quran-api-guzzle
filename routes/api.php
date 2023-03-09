<?php

use App\Http\Controllers\QuranController;
use Illuminate\Http\Request;
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

Route::prefix('/quran')->controller(QuranController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/fetch', 'fetch');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
