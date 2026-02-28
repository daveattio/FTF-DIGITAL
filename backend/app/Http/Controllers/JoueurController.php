<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use Illuminate\Http\Request;
use App\Http\Resources\JoueurResource;

class JoueurController extends Controller
{
    public function index()
    {
        // Retourne tous les joueurs actifs, triés par nom
        // On utilise la Resource pour formater le JSON
        return JoueurResource::collection(Joueur::where('est_actif', true)->orderBy('nom')->get());
    }

    public function show($id)
    {
        return new JoueurResource(Joueur::findOrFail($id));
    }
}
