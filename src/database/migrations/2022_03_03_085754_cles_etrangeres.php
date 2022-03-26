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

        // Notifications
        Schema::table('notifications_simple', function (Blueprint $table) {
            $table->foreign('id_destinataire')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs');
        });

        Schema::table('notifications_modification_besoin', function (Blueprint $table) {
            $table->foreign('id_destinataire')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs');
            $table->foreign('id_envoyeur')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_besoin_en_attente')->references('id_besoin')->on('besoins_en_attente');
            $table->foreign('id_besoin_original')->references('id_besoin')->on('besoins_actifs');
        });

        Schema::table('notifications_suppression_besoin', function (Blueprint $table) {
            $table->foreign('id_destinataire')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs');
            $table->foreign('id_envoyeur')->references('id_evenement')->on('evenements_actifs');
            $table->foreign('id_besoin')->references('id_besoin')->on('besoins_actifs');
        });

        Schema::table('notifications_proposition_besoin', function (Blueprint $table) {
            $table->foreign('id_destinataire')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs');
            $table->foreign('id_envoyeur')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_besoin_en_attente')->references('id_besoin')->on('besoins_en_attente');

        });

        Schema::table('notifications_volontariat_besoin', function (Blueprint $table) {
            $table->foreign('id_destinataire')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs');
            $table->foreign('id_envoyeur')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_besoin_en_attente')->references('id_besoin')->on('besoins_en_attente');
        });

        Schema::table('notifications_demande_participation', function (Blueprint $table) {
            $table->foreign('id_destinataire')->references('id_compte')->on('comptes_actifs');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs');
            $table->foreign('id_envoyeur')->references('id_compte')->on('comptes_actifs');
        });

        Schema::table('notifications_invitation_participation', function (Blueprint $table) {
			$table->foreign('id_destinataire')->references('id_compte')->on('comptes_actifs');
			$table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs');
			$table->foreign('id_envoyeur')->references('id_compte')->on('comptes_actifs');
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
        Schema::table('participants', function (Blueprint $table) {
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

        // Notifications
        Schema::table('notifications_simple', function (Blueprint $table) {
            $table->dropForeign(['id_destinataire']);
            $table->dropForeign(['id_evenement']);
        });

        Schema::table('notifications_modification_besoin', function (Blueprint $table) {
            $table->dropForeign(['id_destinataire']);
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_envoyeur']);
            $table->dropForeign(['id_besoin_en_attente']);
            $table->dropForeign(['id_besoin_original']);
        });

        Schema::table('notifications_suppression_besoin', function (Blueprint $table) {
            $table->dropForeign(['id_destinataire']);
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_envoyeur']);
            $table->dropForeign(['id_besoin']);
        });

        Schema::table('notifications_proposition_besoin', function (Blueprint $table) {
            $table->dropForeign(['id_destinataire']);
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_envoyeur']);
            $table->dropForeign(['id_besoin_en_attente']);
        });

        Schema::table('notifications_volontariat_besoin', function (Blueprint $table) {
            $table->dropForeign(['id_destinataire']);
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_envoyeur']);
            $table->dropForeign(['id_besoin_en_attente']);
        });

        Schema::table('notifications_demande_participation', function (Blueprint $table) {
            $table->dropForeign(['id_destinataire']);
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_envoyeur']);
        });

        Schema::table('notifications_invitation_participation', function (Blueprint $table) {
            $table->dropForeign(['id_destinataire']);
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_envoyeur']);
        });
    }
};
