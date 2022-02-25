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
        // Localisation (id_compte, id_localisation , nom, prenom, photo, mail, hashMDP, dateNaissance, numeroTelephone, dateCreationCompte, dateModifCompte,  notificationMail)


		// Création de la table des localisations
        Schema::create('localisation', function (Blueprint $table) {
            $table->integer('id_localisation')->primary();
            $table->string('ville');
            $table->string('departement')->unique();
            $table->integer('codePostal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localisation');
    }
};
