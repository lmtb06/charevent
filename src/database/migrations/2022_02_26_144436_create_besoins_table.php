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
            $table->integer('id_responsable');
            $table->integer('id_evenement');
            $table->string('titre_B');

        });

        Schema::create('besoinEnAttente', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->integer('id_responsable');
            $table->integer('id_evenement');
            $table->string('titre_B');
            $table->string('typeModif');
            //$table->foreign('id_notificationModifBesoin')->references('id_notification')

        });

        Schema::create('besoinArchive', function (Blueprint $table) {
            $table->integer('besoin_id')->primary();
            $table->integer('id_responsable')->nullable();
            $table->integer('id_evenement')->nullable();
            $table->string('titre_B');
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
