<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaughtPokemonController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pokemon/search/{name}', [CaughtPokemonController::class, 'searchPokedex']);

Route::get('/collection', [CaughtPokemonController::class, 'index']);

Route::post('/collection', [CaughtPokemonController::class, 'store']);
