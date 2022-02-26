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
		Schema::table('besoinActif', function (Blueprint $table) {
            $table->integer('evenement_id');

            $table->foreign('evenement_id')->references('evenement_id')->on('evenements');
            $table->foreign('id_responsable')->references('id_compte')->on('compte');
        });

        Schema::table('besoinEnAttente', function (Blueprint $table) {
            $table->integer('evenement_id');

            $table->foreign('evenement_id')->references('evenement_id')->on('evenements');
            $table->foreign('id_responsable')->references('id_compte')->on('compte');
        });

        Schema::table('besoinArchive', function (Blueprint $table) {
            $table->integer('evenement_id');

            $table->foreign('evenement_id')->references('evenement_id')->on('evenements');
            $table->foreign('id_responsable')->references('id_compte')->on('compte');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('besoinActif', function (Blueprint $table) {
			$table->dropColumn('evenement_id');
            $table->dropForeign(['evenement_id']);
            $table->dropForeign(['id_responsable']);
		});

        Schema::table('besoinEnAttente', function (Blueprint $table) {
			$table->dropColumn('evenement_id');
            $table->dropForeign(['evenement_id']);
            $table->dropForeign(['id_responsable']);
		});

        Schema::table('besoinArchive', function (Blueprint $table) {
			$table->dropColumn('evenement_id');
            $table->dropForeign(['evenement_id']);
            $table->dropForeign(['id_responsable']);
		});
	}
};
