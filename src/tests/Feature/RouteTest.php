<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Evenement;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /*
    public function test_post_evenement_update_1()
    {
        $evenement = Evenement::findOrFail(1);
        $response = $this->call('POST', '/evenement/update/1', ['titre' => 'titre', 'description' => $evenement->description, 'dateDebut' => $evenement->dateDebut]);

        $response->assertStatus(200);
    }
    */
    public function test_post_evenement_delete_1()
    {
        $evenement = Evenement::findOrFail(1);
        $response = $this->call('POST', '/evenement/delete/1');

        $response->assertStatus(200);
    }
    
}
