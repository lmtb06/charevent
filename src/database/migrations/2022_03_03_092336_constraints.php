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
        Schema::table('comptes_actifs', function (Blueprint $table) {
            $table->unique('mail');
        });

        Schema::table('comptes_archives', function (Blueprint $table) {
            $table->unique('mail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comptes_actifs', function (Blueprint $table) {
            $table->dropUnique(['mail']);
        });

        Schema::table('comptes_archives', function (Blueprint $table) {
            $table->dropUnique(['mail']);
        });
    }
};
