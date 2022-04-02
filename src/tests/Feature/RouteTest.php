<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Evenement;
use App\Models\User;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_index()
    {
        $user = User::findOrFail(1);

        $response = $this->actingAs($user)
                            ->get('/');

        $response->assertStatus(200);
    }

    /*
    public function test_post_evenement_update_1()
    {
        $user = User::findOrFail(1);
        $evenement = Evenement::findOrFail(1);
        $response = $this->actingAs($user)
                         ->call('POST', '/evenement/update/1', ['titre' => 'titre', 'description' => $evenement->description, 'dateDebut' => $evenement->dateDebut]);

        $response->assertStatus(200);
    }
    */

    /*
    public function test_post_evenement_delete_1()
    {
        $user = User::findOrFail(1);
        $evenement = Evenement::findOrFail(1);
        $response = $this->actingAs($user)
                         ->call('POST', '/evenement/delete/1');

        $response->assertStatus(200);
    }
    */
    /*
    public function test_post_besoin_add_1()
    {
        $user = User::findOrFail(1);
        $response = $this->actingAs($user)
                         ->call('POST', '/evenement/1/besoin/store', ['titre' => 'titre']);
    }
    */
    /*
    public function test_post_besoin_add_2()
    {
        $user = User::findOrFail(1);
        $response = $this->actingAs($user)
                         ->call('POST', '/evenement/2/besoin/store', ['titre' => 'titre1']);
    }
    */
    /*
    public function test_post_besoin_edit_1()
    {
        $user = User::findOrFail(1);
        $response = $this->actingAs($user)
                         ->call('POST', '/evenement/besoin/update/4', ['titre' => 'titre']);
    }
    */
    /*
    public function test_post_besoin_edit_2()
    {
        $user = User::findOrFail(1);
        $response = $this->actingAs($user)
                         ->call('POST', '/evenement/besoin/update/5', ['titre' => 'new_titre']);
    }
    */
    /*
    public function test_post_besoin_delete_1()
    {
        $user = User::findOrFail(1);
        $response = $this->actingAs($user)
                         ->call('POST', '/evenement/besoin/delete/4');
    }
    */
    public function test_post_besoin_delete_1()
    {
        $user = User::findOrFail(1);
        $response = $this->actingAs($user)
                         ->call('POST', '/evenement/besoin/delete/5');
    }
}