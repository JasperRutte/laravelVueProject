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

//Route::resource('/components', 'ArtistInfoController');

route::get('artistinfo', [App\Http\Controllers\ArtistInfoController::class, 'index']);
Route::get('/artistinfo/create', [\App\Http\Controllers\ArtistInfoController::class, 'create']); //shows create post form
Route::post('/artistinfo/create', [\App\Http\Controllers\ArtistInfoController::class, 'store']);

//Route::post('/project_field/create_activity', [App\Http\Controllers\FieldController::class, 'create_activity']);
