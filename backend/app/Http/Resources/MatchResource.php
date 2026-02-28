<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class MatchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'affiche' => 'Togo vs ' . $this->adversaire, // Ex: "Togo vs Maroc"
            'adversaire' => $this->adversaire,
            'date_match' => Carbon::parse($this->date_heure)->format('d/m/Y H:i'), // Format lisible
            'lieu' => $this->lieu,
            'competition' => $this->competition,
            'scores' => [
                'togo' => $this->score_togo,
                'adversaire' => $this->score_adversaire,
            ],
            'statut' => $this->statut, // A_VENIR, TERMINE...
        ];
    }
}
