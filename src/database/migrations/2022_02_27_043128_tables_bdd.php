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
		// Crée les tables de la base de données

		// Comptes
		Schema::create('comptes_actifs', function (Blueprint $table) {
			$table->integer('id_compte', true);
			$table->integer('id_residence');
			$table->string('nom', 50);
			$table->string('prenom', 50);
			$table->string('photo', 50)->nullable();
			$table->string('mail', 320);
			$table->string('hashMDP', 256);
			$table->date('dateNaissance');
			$table->string('numeroTelephone', 12)->nullable();
			$table->date('dateCreationCompte');
			$table->date('dateModifCompte');
			$table->boolean('notificationMail')->default(0);
			$table->string('role')->default('user');
		});

		Schema::create('comptes_archives', function (Blueprint $table) {
			$table->integer('id_compte', true);
			$table->integer('id_residence');
			$table->string('nom', 50);
			$table->string('prenom', 50);
			$table->string('photo', 50)->nullable();
			$table->string('mail', 320);
			$table->string('hashMDP', 256);
			$table->date('dateNaissance');
			$table->string('numeroTelephone', 12)->nullable();
			$table->date('dateCreationCompte');
			$table->date('dateModifCompte');
			$table->boolean('notificationMail');
			$table->string('role')->default('user');
		});

		// Evenements
		Schema::create('evenements_actifs', function (Blueprint $table) {
				$table->integer('id_evenement', true);
				$table->integer('id_createur');
				$table->integer('id_localisation')->nullable();
				$table->string('titre', 50);
				$table->string('description', 500);
				$table->date('dateDebut');
				$table->date('dateFin')->nullable();
				$table->date('expiration')->nullable();
			}
		);

		Schema::create('evenements_archives', function (Blueprint $table) {
				$table->integer('id_evenement',true);
				$table->integer('id_createur');
				$table->integer('id_localisation')->nullable();
				$table->string('titre', 50);
				$table->string('description', 500);
				$table->date('dateDebut');
				$table->date('dateFin')->nullable();
				$table->date('expiration')->nullable();
			}
		);

		// Participants
		Schema::create('participants', function (Blueprint $table) {
				$table->integer('id_evenement');
				$table->integer('id_compte');
			}
		);

		// Besoins
		Schema::create('besoins_actifs', function (Blueprint $table) {
				$table->integer('id_besoin',true);
				$table->integer('id_evenement');
				$table->integer('id_responsable')->nullable();
				$table->string('titre', 50);
			}
		);

		Schema::create('besoins_archives', function (Blueprint $table) {
				$table->integer('id_besoin', true);
				$table->integer('id_evenement');
				$table->integer('id_responsable')->nullable();
				$table->string('titre', 50);
			}
		);

		Schema::create('besoins_en_attente', function (Blueprint $table) {
				$table->integer('id_besoin', true);
				$table->integer('id_evenement');
				$table->integer('id_responsable')->nullable();
				$table->string('titre', 50);
			}
		);

		// Localisations
		Schema::create('localisations', function (Blueprint $table) {
				$table->integer('id_localisation',true);
				$table->string('ville', 50);
				$table->string('departement', 3);
				$table->string('codePostal', 5);
			}
		);

		// Notifications
		Schema::create('notifications_simple', function (Blueprint $table) {
				$table->integer('id_notification',true);
				$table->integer('id_destinataire');
				$table->integer('id_evenement');
				$table->date('dateReception');
				$table->date('dateLecture')->nullable();
				$table->string('message', 50);
				$table->boolean('supprime');
			}
		);

		Schema::create('notifications_modification_besoin', function (Blueprint $table) {
				$table->integer('id_notification',true);
				$table->integer('id_destinataire');
				$table->integer('id_evenement');
				$table->integer('id_envoyeur');
				$table->integer('id_besoin_en_attente');
				$table->date('dateReception');
				$table->date('dateLecture');
				$table->string('message', 50);
				$table->boolean('supprime');
				$table->boolean('accepte');
				$table->date('dateChoix')->nullable();
			}
		);

		Schema::create('notifications_suppression_besoin', function (Blueprint $table) {
				$table->integer('id_notification', true);
				$table->integer('id_destinataire');
				$table->integer('id_evenement');
				$table->integer('id_envoyeur');
				$table->integer('id_besoin_en_attente');
				$table->date('dateReception');
				$table->date('dateLecture');
				$table->string('message', 50);
				$table->boolean('supprime');
				$table->boolean('accepte');
				$table->date('dateChoix');
			}
		);

		Schema::create('notifications_proposition_besoin', function (Blueprint $table) {
				$table->integer('id_notification', true);
				$table->integer('id_destinataire');
				$table->integer('id_evenement');
				$table->integer('id_envoyeur');
				$table->integer('id_besoin_en_attente');
				$table->date('dateReception');
				$table->date('dateLecture');
				$table->string('message', 50);
				$table->boolean('supprime');
				$table->boolean('accepte');
				$table->date('dateChoix');
			}
		);

		Schema::create('notifications_volontariat_besoin', function (Blueprint $table) {
				$table->integer('id_notification', true);
				$table->integer('id_destinataire');
				$table->integer('id_evenement');
				$table->integer('id_envoyeur');
				$table->integer('id_besoin_en_attente');
				$table->date('dateReception');
				$table->date('dateLecture');
				$table->string('message', 50);
				$table->boolean('supprime');
				$table->boolean('accepte');
				$table->date('dateChoix');
			}
		);

		Schema::create('notifications_demande_participation', function (Blueprint $table) {
				$table->integer('id_notification', true);
				$table->integer('id_destinataire');
				$table->integer('id_evenement');
				$table->integer('id_envoyeur');
				$table->date('dateReception');
				$table->date('dateLecture');
				$table->string('message', 50);
				$table->boolean('supprime');
				$table->boolean('accepte');
				$table->date('dateChoix');
			}
		);

		Schema::create('notifications_invitation_participation', function (Blueprint $table) {
				$table->integer('id_notification', true);
				$table->integer('id_destinataire');
				$table->integer('id_evenement');
				$table->integer('id_envoyeur');
				$table->date('dateReception');
				$table->date('dateLecture');
				$table->string('message', 50);
				$table->boolean('supprime');
				$table->boolean('accepte');
				$table->date('dateChoix');
			}
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Supprime les tables de la base de données

		// Comptes
		Schema::dropIfExists('comptes_actifs');
		Schema::dropIfExists('comptes_archives');
		// Evenements
		Schema::dropIfExists('evenements_actifs');
		Schema::dropIfExists('evenements_archives');
		// Participants
		Schema::dropIfExists('participants');
		// Besoins
		Schema::dropIfExists('besoins_actifs');
		Schema::dropIfExists('besoins_en_attente');
		Schema::dropIfExists('besoins_archives');
		// Localisations
		Schema::dropIfExists('localisations');
		// Notifications
		Schema::dropIfExists('notifications_simple');
		Schema::dropIfExists('notifications_modification_besoin');
		Schema::dropIfExists('notifications_suppression_besoin');
		Schema::dropIfExists('notifications_proposition_besoin');
		Schema::dropIfExists('notifications_volontariat_besoin');
		Schema::dropIfExists('notifications_demande_participation');
		Schema::dropIfExists('notifications_invitation_participation');
	}
};
