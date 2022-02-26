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
		Schema::table('evenements', function (Blueprint $table) {
			$table->foreign('id_createur')->references('ComptesActifs')->on('id_compte');
		});

        Schema::table('evenements', function (Blueprint $table) {
			$table->foreign('id_localisation')->references('id_localisation')->on('localisation');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('evenements', function (Blueprint $table) {
			$table->dropForeign(['id_createur']);
		});

        Schema::table('evenements', function (Blueprint $table) {
			$table->dropForeign(['id_localisation']);
		});
	}
};
