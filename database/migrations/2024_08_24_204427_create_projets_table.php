<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entreprise_id');
            $table->string('intitule');
            $table->text('description');
            $table->float('budget', 15);
            $table->integer('temps_execution'); 
            $table->string('cahier_charge'); 
            $table->timestamps();

            // Clé étrangère pour relier au modèle Entreprise
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('projets');
    }
}
