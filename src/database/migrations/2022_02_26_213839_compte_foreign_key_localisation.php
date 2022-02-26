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
        Schema::table('ComptesActifs', function (Blueprint $table) {
            $table->foreign('id_residence')->references('id_localisation')->on('localisation');
        });

        Schema::table('ComptesArchives', function (Blueprint $table) {
            $table->foreign('id_residence')->references('id_localisation')->on('localisation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ComptesActifs', function (Blueprint $table) {
            $table->dropForeign('ComptesActifs_id_residence_foreign');
        });

        Schema::table('ComptesArchives', function (Blueprint $table) {
            $table->dropForeign('ComptesArchives_id_residence_foreign');
        });
    }
};
