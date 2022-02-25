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
		// CompteActif (id_compte, id_localisation , nom, prenom, photo, mail, hashMDP, dateNaissance, numeroTelephone, dateCreationCompte, dateModifCompte,  notificationMail)

		// CompteArchivé (id_compte, id_localisation , nom, prenom, photo, mail, hashMDP, dateNaissance, numeroTelephone, dateCreationCompte, dateModifCompte, notificationMail)


		// Création de la table des comptes actifs
		Schema::create('ComptesActifs', function (Blueprint $table) {
			$table->integer("id_compte")->primary();
			$table->integer("id_residence");
			$table->string('nom', 50);
			$table->string('prenom', 50);
			$table->string('photo', 50);
			$table->string('mail', 320)->unique();
			$table->string('hashMDP', 256);
			$table->date('dateNaissance');
			$table->string('numeroTelephone', 12);
			$table->date('dateCreationCompte');
			$table->date('dateModifCompte');
			$table->boolean('notificationMail');
			$table->string('role');
		});

		// Création de la table des comptes archivés
		Schema::create('ComptesArchives', function (Blueprint $table) {
			$table->integer("id_compte")->primary();
			$table->integer("id_residence");
			$table->string('nom', 50);
			$table->string('prenom', 50);
			$table->string('photo', 50);
			$table->string('mail', 320)->unique();
			$table->string('hashMDP', 256);
			$table->date('dateNaissance');
			$table->string('numeroTelephone', 12);
			$table->date('dateCreationCompte');
			$table->date('dateModifCompte');
			$table->boolean('notificationMail');
			$table->string('role');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('CompteActif');
		Schema::dropIfExists('CompteArchive');
	}
};
