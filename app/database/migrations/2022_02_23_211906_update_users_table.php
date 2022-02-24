<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->foreignId('localisation_id')->references('id')->on('localisations');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        if (Schema::hasTable('utilisateurs')) {
            if (Schema::hasColumn('utilisateurs', 'localisation_id')) {
                Schema::table('utilisateurs', function (Blueprint $table) {
                    $table->dropForeign('localisation_id');
                });
            }
        }
        */
    }
    
}
