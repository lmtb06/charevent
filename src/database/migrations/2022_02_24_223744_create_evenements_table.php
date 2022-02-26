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
        Schema::create('evenements', function (Blueprint $table) {
            $table->integer('evenement_id')->primary();
            $table->integer('localisation_id');
            $table->integer('createur_id');
            $table->string('titreE', 250);
            $table->string('description', 1000);
            $table->date('dateDebut');
            $table->date('dateFin')->nullable();
            $table->date('expiration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
};
