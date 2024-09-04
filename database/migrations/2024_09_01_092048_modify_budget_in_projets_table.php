<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyBudgetInProjetsTable extends Migration
{
    public function up()
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->float('budget', 15, 2)->change(); // Modifier la colonne budget en float
        });
    }

    public function down()
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->integer('budget')->change(); // Revenir à l'ancien type si on fait un rollback
        });
    }
}