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
        Schema::create('notification_choix', function (Blueprint $table) {
            $table->integer('notification_id')->primary();
			$table->integer('destinataire_id');
			$table->integer('envoyeur_id');
            $table->date('dateReception');
            $table->date('dateLecture')->nullable();
            $table->string('message', 1000);
            $table->string('description', 1000);
            $table->string('typeMessage', 10);
			$table->boolean('accepte');
			$table->date('dateChoix')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_choix');
    }
};