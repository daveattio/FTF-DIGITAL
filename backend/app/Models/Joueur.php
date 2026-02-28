<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    // Indispensable pour le JSON dans Laravel
    protected $casts = [
        'stats' => 'array',
        'date_naissance' => 'date',
        'est_actif' => 'boolean',
    ];

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'poste',
        'club_actuel',
        'photo_url',
        'est_actif',
        'stats'
    ];
}
