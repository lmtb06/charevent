<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Participant;
use App\Models\BesoinActif;

class AddDataTest extends TestCase
{   /*
    public function test_ajouter_besoins_1()
    {
		$user = User::create([
			'id_residence' => 1,
			'nom' => 'nom1',
			'prenom' => 'prenom1',
			'mail' => '1@1.1',
			'hashMDP' => 'abc',
			'dateNaissance' => '2000-01-01',
			'dateCreationCompte' => '2022-01-01',
			'dateModifCompte' => '2022-01-01',
			'notificationMail' => 0,
		]);

		$user = User::create([
			'id_residence' => 1,
			'nom' => 'nom2',
			'prenom' => 'prenom2',
			'mail' => '2@2.2',
			'hashMDP' => 'abc',
			'dateNaissance' => '2000-01-01',
			'dateCreationCompte' => '2022-01-01',
			'dateModifCompte' => '2022-01-01',
			'notificationMail' => 1,
		]);

		$user = BesoinActif::create([
			'id_evenement' => 1,
			'titre' => 'besoin1',
		]);
		
		$user = BesoinActif::create([
			'id_evenement' => 1,
			'titre' => 'besoin2',
			'id_responsable' => 2,
		]);

        $user = Participant::create([
			'id_compte' => 2,
			'id_evenement' => 1,
		]);

        $user = Participant::create([
			'id_compte' => 3,
			'id_evenement' => 1,
		]);
    }
    */
    /*
    public function test_ajouter_users()
    {
		$user = User::create([
			'id_residence' => 1,
			'nom' => 'nom1',
			'prenom' => 'prenom1',
			'mail' => '3@3.3',
			'hashMDP' => 'abc',
			'dateNaissance' => '2010-01-01',
			'dateCreationCompte' => '2022-01-01',
			'dateModifCompte' => '2022-01-01',
			'notificationMail' => 0,
		]);

		$user = User::create([
			'id_residence' => 1,
			'nom' => 'nom2',
			'prenom' => 'prenom2',
			'mail' => '4@4.4',
			'hashMDP' => 'abc',
			'dateNaissance' => '2000-01-01',
			'dateCreationCompte' => '2022-01-01',
			'dateModifCompte' => '2022-01-01',
			'notificationMail' => 1,
		]);
    }
    */
}
