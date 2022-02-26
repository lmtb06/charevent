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
        //besoinsActif (id_besoin, id_evenement, id_responsable, titre_B)
        //besoinEnAttente (id_besoin, id_evenemenent, titre_B, typeModif)
        //besoinArchivé (id_besoin, id_evenement, id_responsable, titre_B)


        Schema::create('besoinActif', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->string('titreB');
            $table->string('id_responsable')->nullable();
        });

        Schema::create('besoinEnAttente', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->string('titreB');
            $table->string('typeModif');
            $table->string('id_responsable')->nullable();   
        });  
        
        Schema::create('besoinArchive', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->string('titreB');
            $table->string('id_responsable')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('besoinActif');
        Schema::dropIfExists('besoinEnAttente');
        Schema::dropIfExists('besoinArchive');
    }
};
