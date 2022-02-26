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
        //BesoinEnAttente (id_besoin, id_evenemenent, id_modificateur, titre_B)
        //BesoinArchivé (id_besoin, id_evenement, id_responsable, titre_B)


        Schema::create('besoinsActif', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->string('titreB');
            $table->index('id_evenement');
            $table->foreign('id_evenement')->references(evenement_id)->on('evenements')->onDelete('cascade');
            $table->index('id_responsable');
            $table->integer('id_responsable')->references(id_compte)->on('ComptesActifs')->onDelete('cascade');
        });

        Schema::create('besoinsEnAttente', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->string('titreB');
            $table->index('id_evenement');
            $table->foreign('id_evenement')->references(evenement_id)->on('evenements')->onDelete('cascade');
            $table->index('id_notification');
            $table->integer('id_notification')->references(notification_id)->on('notification_simple')->onDelete('cascade');
        });  
        
        Schema::create('besoinsArchive', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->string('titreB');
            $table->index('id_evenement');
            $table->foreign('id_evenement')->references(evenement_id)->on('evenements')->onDelete('cascade');
            $table->index('id_responsable');
            $table->integer('id_responsable')->references(id_compte)->on('ComptesActifs')->onDelete('cascade');
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
        Schema::dropIfExists('besoinsActif');
        Schema::dropIfExists('besoinsEnAttente');
        Schema::dropIfExists('besoinsArchive');
    }
};
