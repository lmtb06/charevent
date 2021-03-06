<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\InvitationController;
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
    Route::get('/compte/edit', [ProfilController::class, 'edit'])->name('pageModificationCompte');
    Route::get('/compte', [ProfilController::class, 'show'])->name('pageProfil');


    Route::get('/evenement/{id}/invitation', [InvitationController::class, 'showForm'])->whereNumber('id')->name('pageFromRechercheParticipants');


    Route::get('/evenement/create', [EvenementCreationController::class, 'show'])->name('pageCreationEvenement');
    Route::get('/evenement/show/{id}', [EvenementController::class, 'show'])->whereNumber('id')->name('pageEvenement');
    Route::get('/evenements', [EvenementController::class, 'showAll'])->name('pagesEvenements');
    Route::get('/evenement/edit/{id}', [EvenementController::class, 'edit'])->whereNumber('id')->name('pageModificationEvenement');


    Route::get('notifs/all', [NotificationController::class, 'index'])->name('notification');
    Route::get('notifs/count', [NotificationController::class, 'nbNotif'])->name('nbNotif');

    // Routes POST
    // Routes POST (traitement de données provenant des pages webs)
    Route::post('/compte/update', [ProfilController::class, 'update'])->name('modifierCompte');
    Route::post('/compte/updateMdp', [ProfilController::class, 'updatePassword'])->name('modifierMdp');
    Route::post('/compte/delete}', [ProfilSuppressionController::class, 'delete'])->name('effacerCompte');

    Route::post('/evenement/store', [EvenementCreationController::class, 'store'])->name('creerEvenement');
    Route::post('/evenement/update/{id}', [EvenementController::class, 'update'])->whereNumber('id')->name('modifierEvenement');
    Route::post('/evenement/delete/{id}', [EvenementController::class, 'delete'])->name('effacerEvenement')->whereNumber('id');

    Route::post('/evenement/{id}/invitation/resultat', [ParticipantController::class, 'search'])->whereNumber('id')->name('rechercheParticipant');
    Route::post('/evenement/{id}/canditature', [ParticipantController::class, 'create'])->whereNumber('id')->name('postule');
    Route::post('/evenement/{id}/invite', [ParticipantController::class, 'store'])->whereNumber('id')->name('invitation');
    Route::post('/evenement/{id}/quitter', [ParticipantController::class, 'delete'])->whereNumber('id')->name('quitter');

    Route::post('notifs/read', [NotificationController::class, 'markAsRead'])->name('markAsRead');
    Route::post('/notif/accepte', [NotificationController::class, 'accepte'])->name('accepteNotif');
    Route::post('/notif/refuse', [NotificationController::class, 'refuse'])->name('refuseNotif');
    Route::post('/notif/delete', [NotificationController::class, 'destroy'])->name('supprimerNotification');



    Route::post('/evenement/{id}/besoin/store', [BesoinController::class, 'store'])->whereNumber('id')->name('creerBesoin');
    Route::post('/evenement/besoin/update/{id}', [BesoinController::class, 'update'])->whereNumber('id')->name('modifierBesoin');
    Route::post('/evenement/besoin/delete/{id}', [BesoinController::class, 'delete'])->whereNumber('id')->name('effacerBesoin');

});

