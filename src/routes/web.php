<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RecuperationController;
use App\Http\Controllers\EvenementCreationController;
use App\Http\Controllers\ProfilSuppressionController;
use App\Http\Controllers\BesoinController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Routes Accueil, accessible connecté ou non
Route::get('/', [AccueilController::class, 'index'])->name('accueil');


// On ne peut accéder à ces routes que si l'on est pas connecté
Route::group(['middleware' => 'guest'], function(){
    // Routes Inscription
    Route::get('/inscription', [InscriptionController::class, 'index'])->name('inscription');
    Route::post('/inscription', [InscriptionController::class, 'create'])->name('inscription');

    // Routes Authentification
    Route::get('/connexion', [ConnexionController::class, 'index'])->name('connexion');
    Route::post('/connexion', [ConnexionController::class, 'login'])->name('connexion');

    // Routes Recupération mot de passe
    Route::get('/recuperation', [RecuperationController::class, 'index'])->name('recuperation');
    Route::post('/recuperation', [RecuperationController::class, 'reset'])->name('recuperation');

});



/**
 * Groupe de routes nécessitant à l'utilisateur d'être authentifier
 */
Route::group(['middleware' => 'auth'], function(){
    Route::post('/deconnexion', [ConnexionController::class, 'logout'])->name('deconnexion');

    /**
     * URL à utiliser pour afficher les pages correspondantes / déconnecter un utilisateur
     */
    Route::get('/compte/edit/{id}', [ProfilController::class, 'edit'])->whereNumber('id')->name('pageModificationCompte');
    Route::get('/compte', [ProfilController::class, 'show'])->name('pageProfil');


    Route::get('/evenement/{id}/invitation', [InvitationController::class, 'showForm'])->whereNumber('id')->name('pageFromRechercheParticipants');


    Route::get('/evenement/create', [EvenementCreationController::class, 'show'])->name('pageCreationEvenement');
    Route::get('/evenement/show/{id}', [EvenementController::class, 'show'])->whereNumber('id')->name('pageEvenement');
    Route::get('/evenements', [EvenementController::class, 'showAll'])->name('pagesEvenements');
    Route::get('/evenement/edit/{id}', [EvenementController::class, 'edit'])->whereNumber('id')->name('pageModificationEvenement');


    Route::get('notifs/all', [NotificationController::class, 'index'])->name('pageNotification');
    // Routes POST
    Route::post('/compte/update/{id}', [ModifierCompteController::class, 'update'])->whereNumber('id')->name('modifierCompte');
    // Routes POST (traitement de données provenant des pages webs)
    Route::post('/compte/update/{id}', [ProfilController::class, 'update'])->whereNumber('id')->name('modifierCompte');
    Route::post('/compte/delete/{id}', [ProfilSuppressionController::class, 'delete'])->whereNumber('id')->name('effacerCompte');

    Route::post('/evenement/store', [EvenementCreationController::class, 'store'])->name('creerEvenement');
    Route::post('/evenement/update/{id}', [EvenementController::class, 'update'])->whereNumber('id')->name('modifierEvenement');
    Route::post('/evenement/delete/{id}', [EvenementController::class, 'delete'])->name('effacerEvenement')->whereNumber('id');

    Route::post('/evenement/{id}/invitation/resultat', [ParticipantController::class, 'search'])->whereNumber('id')->name('rechercheParticipant');
    Route::post('/evenement/{id}/canditature', [ParticipantController::class, 'create'])->whereNumber('id')->name('postule');
    Route::post('/evenement/{id}/invite', [ParticipantController::class, 'store'])->whereNumber('id')->name('invitation');

    Route::post('/evenement/{id}/besoin/store', [BesoinController::class, 'store'])->whereNumber('id')->name('creerBesoin');
    Route::post('/evenement/besoin/update/{id}', [BesoinController::class, 'update'])->whereNumber('id')->name('modifierBesoin');
    Route::post('/evenement/besoin/delete/{id}', [BesoinController::class, 'delete'])->whereNumber('id')->name('effacerBesoin');
});

