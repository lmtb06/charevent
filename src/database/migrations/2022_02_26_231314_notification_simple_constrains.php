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
		Schema::table('notification_simple', function (Blueprint $table) {
			$table->foreign('destinataire_id')->references('id_compte')->on('ComptesActifs');
            $table->foreign('evenement_id')->references('evenement_id')->on('evenements');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('notification_simple', function (Blueprint $table) {
			$table->dropForeign(['destinataire_id']);
			$table->dropForeign(['evenement_id']);
		});
	}
};
