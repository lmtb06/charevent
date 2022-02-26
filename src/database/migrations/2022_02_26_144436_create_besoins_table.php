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
            $table->string('descriptionB');
            
        });

        Schema::create('besoinEnAttente', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->string('titreB');
            $table->string('typeModif');
            $table->string('descriptionB');
            //$table->foreign('id_notificationModifBesoin')->references('id_notification')
            
        });  
        
        Schema::create('besoinArchive', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->string('titreB');
            $table->string('descriptionB');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //$table->dropForeign('compte');
        //$table->dropColumn('id_responsable')
        //$table->dropForeign('create_evenements_table')
        //$table->dropColumn('id_evenement');
        //$table->dropForeign('create_evenement_archives_table')
        //$table->dropColumn('id_evenement');
        Schema::dropIfExists('besoinActif');
        Schema::dropIfExists('besoinEnAttente');
        Schema::dropIfExists('besoinArchive');
    }
};
