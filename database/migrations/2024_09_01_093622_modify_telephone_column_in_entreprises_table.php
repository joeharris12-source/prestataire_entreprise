<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTelephoneColumnInEntreprisesTable extends Migration
{
    public function up()
    {
        Schema::table('entreprises', function (Blueprint $table) {
            // Modifier la colonne 'telephone' pour utiliser 'bigInteger'
            $table->Integer('telephone')->change();
        });
    }

    public function down()
    {
        Schema::table('entreprises', function (Blueprint $table) {
            // Revenir au type 'string' si nécessaire
            $table->integer('telephone')->change();
        });
    }
}
