<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('artistinfo', [App\Http\Controllers\ArtistInfoController::class, 'index']);
Route::get('artistinfo/create', [App\Http\Controllers\ArtistInfoController::class, 'create']); //shows create post form
Route::post('artistinfo/create', [App\Http\Controllers\ArtistInfoController::class, 'store']);
Route::get('artistinfo/{artist}', [App\Http\Controllers\ArtistInfoController::class, 'show']);
Route::get('artistinfo/{artist}/edit', [App\Http\Controllers\ArtistInfoController::class, 'edit']); //shows edit post form
Route::put('artistinfo/{artist}/edit', [App\Http\Controllers\ArtistInfoController::class, 'update']);
Route::delete('artistinfo/{artist}', [App\Http\Controllers\ArtistInfoController::class, 'destroy']);

Route::get('platenmaatschappijen', [App\Http\Controllers\PlatenmatschappijenController::class, 'index']);
Route::get('platenmaatschappijen/create', [App\Http\Controllers\PlatenmatschappijenController::class, 'create']);
Route::post('platenmaatschappijen/create', [App\Http\Controllers\PlatenmatschappijenController::class, 'store']);
Route::get('platenmaatschappijen/{platenmaatschappij}/edit', [App\Http\Controllers\PlatenmatschappijenController::class, 'edit']); //shows edit post form
Route::put('platenmaatschappijen/{platenmaatschappij}/edit', [App\Http\Controllers\PlatenmatschappijenController::class, 'update']);
Route::delete('platenmaatschappijen/{platenmaatschappij}', [App\Http\Controllers\PlatenmatschappijenController::class, 'destroy']);
