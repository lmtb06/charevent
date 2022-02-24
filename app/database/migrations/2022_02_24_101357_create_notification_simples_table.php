<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationSimplesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_simples', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('destinataire_id')->references('id')->on('users');
            $table->date('dateReception')->useCurrent();
            $table->date('dateLecture')->nullable();
            $table->string('message', 150);
            $table->string('typeMessage', 50);
            $table->boolean('supprime')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_simples');
    }
}
