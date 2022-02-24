<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evenements', function (Blueprint $table) {
            //$table->foreignId('localisation_id')->references('id')->on('localisations');
            //$table->foreignId('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('evenements')) {

            /*
            if (Schema::hasColumn('evenements', 'localisation_id')) {
                Schema::table('evenements', function (Blueprint $table) {
                    $table->dropForeign('localisation_id');
                });
            }

            if (Schema::hasColumn('evenements', 'user_id')) {
                Schema::table('evenements', function (Blueprint $table) {
                    $table->dropForeign('user_id');
                });
            }
            */
        }
    }
}
