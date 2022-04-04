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
        Schema::create('notifications', function (Blueprint $table) {
            $table->integer('id_notification',true);
            $table->string('type')->default("perdu");
            $table->integer('id_destinataire');
            $table->integer('id_evenement')->nullable();
            $table->integer('id_envoyeur');
            $table->integer('id_besoin_original')->nullable();
            $table->integer('id_besoin_en_attente')->nullable();
            $table->date('dateReception');
            $table->date('dateLecture')->nullable();
            $table->string('message', 250)->nullable();
            $table->boolean('supprime')->default(False);
            $table->boolean('accepte')->nullable();
            $table->date('dateChoix')->nullable();

            $table->foreign('id_destinataire')->references('id_compte')->on('comptes_actifs')->onDelete('cascade');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements_actifs')->nullOnDelete();
            $table->foreign('id_envoyeur')->references('id_compte')->on('comptes_actifs')->onDelete('cascade');
            $table->foreign('id_besoin_en_attente')->references('id_besoin')->on('besoins_en_attente')->nullOnDelete();
            $table->foreign('id_besoin_original')->references('id_besoin')->on('besoins_actifs')->nullOnDelete();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['id_destinataire']);
            $table->dropForeign(['id_evenement']);
            $table->dropForeign(['id_envoyeur']);
            $table->dropForeign(['id_besoin_en_attente']);
            $table->dropForeign(['id_besoin_original']);
        });
        Schema::dropIfExists('notifications');
    }
};
