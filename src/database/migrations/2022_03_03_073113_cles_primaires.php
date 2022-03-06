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
        });

        Schema::table('comptes_archives', function (Blueprint $table) {
        });

        // Evenements
        Schema::table('evenements_actifs', function (Blueprint $table) {
        });

        Schema::table('evenements_archives', function (Blueprint $table) {
        });

        // Besoins
        Schema::table('besoins_actifs', function (Blueprint $table) {
        });

        Schema::table('besoins_archives', function (Blueprint $table) {
        });

        Schema::table('besoins_en_attente', function (Blueprint $table) {
        });

        // Localisations
        Schema::table('localisations', function (Blueprint $table) {
        });

        // Notifications
        Schema::table('notifications_simple', function (Blueprint $table) {
        });

        Schema::table('notifications_modification_besoin', function (Blueprint $table) {
        });

        Schema::table('notifications_suppression_besoin', function (Blueprint $table) {
        });

        Schema::table('notifications_proposition_besoin', function (Blueprint $table) {
        });

        Schema::table('notifications_volontariat_besoin', function (Blueprint $table) {
        });

        Schema::table('notifications_demande_participation', function (Blueprint $table) {
        });

        Schema::table('notifications_invitation_participation', function (Blueprint $table) {
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
            $table->dropPrimary();
        });

        Schema::table('comptes_archives', function (Blueprint $table) {
            $table->dropPrimary();
        });

        // Evenements
        Schema::table('evenements_actifs', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('evenements_archives', function (Blueprint $table) {
            $table->dropPrimary();
        });

        // Besoins
        Schema::table('besoins_actifs', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('besoins_archives', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('besoins_en_attente', function (Blueprint $table) {
            $table->dropPrimary();
        });

        // Localisations
        Schema::table('localisations', function (Blueprint $table) {
            $table->dropPrimary();
        });

        // Notifications
        Schema::table('notifications_simple', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('notifications_modification_besoin', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('notifications_suppression_besoin', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('notifications_proposition_besoin', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('notifications_volontariat_besoin', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('notifications_demande_participation', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('notifications_invitation_participation', function (Blueprint $table) {
            $table->dropPrimary();
        });
    }
};