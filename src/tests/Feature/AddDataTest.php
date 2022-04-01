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
    public function test_ajouter_participants_1()
    {
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

    public function test_ajouter_users()
    {
		$user = User::create([
			'id_residence' => 1,
			'nom' => 'nom1',
			'prenom' => 'prenom1',
			'mail' => '1@1.1',
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
			'mail' => '2@2.2',
			'hashMDP' => 'abc',
			'dateNaissance' => '2000-01-01',
			'dateCreationCompte' => '2022-01-01',
			'dateModifCompte' => '2022-01-01',
			'notificationMail' => 1,
		]);
    }
    
	
	public function test_ajouter_event()
    {
		$evenement = Evenement::create([
			'id_localisation' => 1,
        	'id_createur' => 2,
        	'titre' => 'event',
        	'description' => 'descriptiondescri ptiondescriptiondescr iptiondescriptiondescrip tiondescriptiondescription descriptiondescription',
        	'dateDebut' => '2022-05-01',
        	'dateFin' => '2022-06-01',
        	'expiration' => '2023-04-01',
		]);
    }
	
}
