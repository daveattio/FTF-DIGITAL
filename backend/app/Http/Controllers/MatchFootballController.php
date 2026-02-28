<?php

namespace App\Http\Controllers;

use App\Models\MatchFootball;
use App\Http\Resources\MatchResource;
use Illuminate\Http\Request;

class MatchFootballController extends Controller
{
    // 1. Liste de tous les matchs
    public function index()
    {
        // On récupère tout, trié par date (du plus récent au plus vieux ou l'inverse)
        $matchs = MatchFootball::orderBy('date_heure', 'asc')->get();
        return MatchResource::collection($matchs);
    }

    // 2. Détail d'un match spécifique
    public function show($id)
    {
        $match = MatchFootball::findOrFail($id);
        return new MatchResource($match);
    }
}
