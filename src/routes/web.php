<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EvenementCreationController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProfilSuppressionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [AccueilController::class, 'show'])->name('pageAccueil');

/**
 * URL à utiliser pour afficher les pages correspondantes / déconnecter un utilisateur
 */
Route::get('/', [ConnexionController::class, 'show'])->name('pageConnexion');
Route::get('/mdpOublie', [ConnexionController::class, 'showOubliMDP'])->name('pageOubliMDP');
Route::get('/inscription', [InscriptionController::class, 'show'])->name('pageInscription');
Route::get('/compte/edit/{id}', [ProfilController::class, 'edit'])->whereNumber('id')->name('pageModificationCompte');
Route::get('/compte/show/{id}', [ProfilController::class, 'show'])->whereNumber('id')->name('pageProfil');

Route::get('/deconnexion', DeconnexionController::class)->name('pageDeconnexion');

Route::get('/evenement/create', [EvenementCreationController::class, 'show'])->name('pageCreationEvenement');
Route::get('/evenement/show/{id}', [EvenementController::class, 'show'])->whereNumber('id')->name('pageEvenement');
Route::get('/evenement/edit/{id}', [EvenementController::class, 'edit'])->whereNumber('id')->name('pageModificationEvenement');

Route::get('/evenement/edit/{id}/recherche/form', [InvitationController::class, 'showForm'])->whereNumber('id')->name('pageFromRechercheParticipants');
Route::get('/evenement/edit/{id}/recherche/result', [InvitationController::class, 'showResult'])->whereNumber('id')->name('pageResultRechercheParticipants');

// Routes POST (traitement de données provenant des pages webs)
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscrireCompte');
Route::post('/connexion', [ConnexionController::class, 'authenticate'])->name('connecterCompte');
Route::post('/compte/update/{id}', [ProfilController::class, 'update'])->whereNumber('id')->name('modifierCompte');
Route::post('/compte/delete/{id}', [ProfilSuppressionController::class, 'delete'])->whereNumber('id')->name('effacerCompte');

Route::post('/evenement/store', [EvenementCreationController::class, 'store'])->name('creerEvenement');
Route::post('/evenement/update/{id}', [EvenementController::class, 'update'])->whereNumber('id')->name('modifierEvenement');
Route::post('/evenement/delete/{id}', [EvenementController::class, 'delete'])->name('effacerEvenememt')->whereNumber('id');

Route::post('/connexion/mdpOubli', [ConnexionController::class, 'traitementOubliMDP'])->name('traitementOubli');

