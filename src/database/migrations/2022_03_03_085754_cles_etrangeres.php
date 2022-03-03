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
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->foreign('id_compte')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs');
		});

        Schema::table('evenements_actifs', function (Blueprint $table) {
            $table->foreign('id_createur')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_localisation')->references('id_localisation')->on('localisations');
        });
    
        Schema::table('evenements_archives', function (Blueprint $table) {
            $table->foreign('id_createur')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_localisation')->references('id_localisation')->on('localisations');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_compte']);
        });

        Schema::table('evenements_actifs', function (Blueprint $table) {
            $table->dropForeign(['id_createur']);
            $table->dropForeign(['id_localisation']);
        });

        Schema::table('evenements_archives', function (Blueprint $table) {
            $table->dropForeign(['id_createur']);
            $table->dropForeign(['id_localisation']);
        });
    }
};
