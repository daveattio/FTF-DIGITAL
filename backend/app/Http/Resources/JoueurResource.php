<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JoueurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom_complet' => $this->prenom . ' ' . $this->nom, // Concaténation pratique pour le front
            'poste' => $this->poste,
            'club' => $this->club_actuel,
            'photo' => $this->photo_url ?? 'https://via.placeholder.com/150', // Image par défaut
            'age' => $this->date_naissance ? $this->date_naissance->age : null, // Calcul d'âge auto
            'stats' => $this->stats,
        ];
    }
}
