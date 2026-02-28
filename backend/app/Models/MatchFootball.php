<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchFootball extends Model
{
    protected $casts = [
        'date_heure' => 'datetime',
    ];

    protected $fillable = [
        'date_heure',
        'adversaire',
        'lieu',
        'competition',
        'score_togo',
        'score_adversaire',
        'statut'
    ];
}
