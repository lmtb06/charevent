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
		//
		Schema::table('notification_modification_besoin', function (Blueprint $table) {
			$table->foreign('destinataire_id')->references('id_compte')->on('ComptesActifs');
            $table->foreign('evenement_id')->references('evenement_id')->on('evenements');
            $table->foreign('envoyeur_id')->references('id_compte')->on('ComptesActifs');
            $table->foreign('besoin_modifie_id')->references('besoin_id')->on('besoinActif');
		});

        Schema::table('notification_participation', function (Blueprint $table) {
			$table->foreign('destinataire_id')->references('id_compte')->on('ComptesActifs');
            $table->foreign('evenement_id')->references('evenement_id')->on('evenements');
            $table->foreign('envoyeur_id')->references('id_compte')->on('ComptesActifs');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('notification_modification_besoin', function (Blueprint $table) {
			$table->dropForeign(['destinataire_id']);
			$table->dropForeign(['evenement_id']);
            $table->dropForeign(['envoyeur_id']);
            $table->dropForeign(['besoin_modifie_id']);
		});

        Schema::table('notification_modification_besoin', function (Blueprint $table) {
			$table->dropForeign(['destinataire_id']);
			$table->dropForeign(['evenement_id']);
            $table->dropForeign(['envoyeur_id']);
		});
	}
};
