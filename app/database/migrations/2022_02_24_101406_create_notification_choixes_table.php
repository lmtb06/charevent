<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationChoixesTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('notification_choix', function (Blueprint $table) {
            $table->id();
            $table->boolean('accepte')->nullable();
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
}
