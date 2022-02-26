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
		Schema::table('participants', function (Blueprint $table) {
            $table->foreign('id_compte')->references('id_compte')->on('ComptesActifs');
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
		Schema::table('participants', function (Blueprint $table) {
			$table->dropForeign(['evenement_id']);
            $table->dropForeign(['id_compte']);
		});
	}
};
