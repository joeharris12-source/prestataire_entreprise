<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('name'); // Nom de l'entreprise
            $table->string('firstname'); // Prénom du responsable
            $table->string('email')->unique(); // Email unique
            $table->string('telephone'); // Numéro de téléphone
            $table->string('ville'); // Ville de l'entreprise
            $table->string('quartier'); // Quartier de l'entreprise
            $table->string('password'); // Mot de passe
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
