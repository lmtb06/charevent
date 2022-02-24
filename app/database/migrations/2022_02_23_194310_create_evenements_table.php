<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titreE', 50);
            $table->text('description', 500);
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->date('expiration')->nullable();
            $table->foreignId('localisation_id')->references('id')->on('localisations');
            $table->foreignId('user_id')->references('id')->on('users');
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
}
