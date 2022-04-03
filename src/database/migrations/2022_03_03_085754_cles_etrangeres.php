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
        // Comptes
        Schema::table('comptes_actifs', function (Blueprint $table) {
            $table->foreign('id_residence')->references('id_localisation')->on('localisations');
		});

        // Evenements
        Schema::table('evenements_actifs', function (Blueprint $table) {
            $table->foreign('id_createur')->references('id_compte')->on('comptes_actifs')->onDelete('cascade');
            $table->foreign('id_localisation')->references('id_localisation')->on('localisations');
        });

        // Participants
        Schema::table('participants', function (Blueprint $table) {
            $table->foreign('id_compte')->references('id_compte')->on('comptes_actifs')->onDelete('cascade');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs')->onDelete('cascade');
		});

        // Besoins
        Schema::table('besoins_actifs', function (Blueprint $table) {
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs')->onDelete('cascade');
            $table->foreign('id_responsable')->references('id_compte')->on('comptes_actifs')->onDelete('cascade');
        });

        Schema::table('besoins_en_attente', function (Blueprint $table) {
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs')->onDelete('cascade');
            $table->foreign('id_responsable')->references('id_compte')->on('comptes_actifs')->onDelete('cascade');
        });

    

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Comptes
        Schema::table('comptes_actifs', function (Blueprint $table) {
            $table->dropForeign(['id_residence']);
        });

        // Evenements
        Schema::table('evenements_actifs', function (Blueprint $table) {
            $table->dropForeign(['id_createur']);
            $table->dropForeign(['id_localisation']);
        });

        // Participants
        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_compte']);
        });


        // Besoins
        Schema::table('besoins_actifs', function (Blueprint $table) {
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_responsable']);
        });

        Schema::table('besoins_en_attente', function (Blueprint $table) {
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_responsable']);
        });

        
    }
};
