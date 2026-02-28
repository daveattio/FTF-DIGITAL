<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('joueurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance')->nullable();
            // Enum pour forcer la cohérence
            $table->enum('poste', ['GARDIEN', 'DEFENSEUR', 'MILIEU', 'ATTAQUANT']);
            $table->string('club_actuel')->nullable();
            $table->string('photo_url')->nullable(); // Lien vers l'image
            $table->boolean('est_actif')->default(true); // Pour masquer un joueur blessé/retraité

            // La puissance de Neon : JSONB pour les stats flexibles
            // Ex: {"selections": 10, "buts": 2, "minutes": 900}
            $table->jsonb('stats')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joueurs');
    }
};
