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
        Schema::create('match_footballs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_heure');
            $table->string('adversaire'); // Contre qui joue le Togo ?
            $table->string('lieu')->nullable(); // Stade de Kégué, Extérieur...

            $table->string('competition')->default('Amical'); // CAN, Mondial, Amical

            // Scores (nullable car le match n'est pas forcément commencé)
            $table->integer('score_togo')->nullable();
            $table->integer('score_adversaire')->nullable();

            // Statut pour aider le Frontend à filtrer
            $table->enum('statut', ['A_VENIR', 'EN_COURS', 'TERMINE', 'REPORTE'])->default('A_VENIR');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_footballs');
    }
};
