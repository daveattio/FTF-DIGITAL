<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\MatchFootballController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --- Gestion des Joueurs ---
Route::get('/joueurs', [JoueurController::class, 'index']); // Liste
Route::get('/joueurs/{id}', [JoueurController::class, 'show']); // Détail

// --- Gestion des Matchs ---
Route::get('/matchs', [MatchFootballController::class, 'index']); // Liste
Route::get('/matchs/{id}', [MatchFootballController::class, 'show']); // Détail
