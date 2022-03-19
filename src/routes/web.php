<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EvenementCreationController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\RecuperationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProfilSuppressionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\EvenementController;
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


// Routes Accueil
Route::get('/', [AccueilController::class, 'index'])->name('accueil');

// Routes Inscription
Route::get('/inscription', [InscriptionController::class, 'index'])->name('inscription');
Route::post('/inscription', [InscriptionController::class, 'create'])->name('inscription');

// Routes Authentification
Route::get('/connexion', [ConnexionController::class, 'index'])->name('connexion');
Route::post('/connexion', [ConnexionController::class, 'login'])->name('connexion');
Route::post('/deconnexion', [ConnexionController::class, 'logout'])->name('deconnexion');

// Routes Recupération mot de passe
Route::get('/recuperation', [RecuperationController::class, 'index'])->name('recuperation');
Route::post('/recuperation', [RecuperationController::class, 'reset'])->name('recuperation');





/**
 * URL à utiliser pour afficher les pages correspondantes / déconnecter un utilisateur
 */
Route::get('/compte/edit/{id}', [ProfilController::class, 'edit'])->whereNumber('id')->name('pageModificationCompte');
Route::get('/compte/show/{id}', [ProfilController::class, 'show'])->whereNumber('id')->name('pageProfil');


Route::get('/evenement/create', [EvenementCreationController::class, 'show'])->name('pageCreationEvenement');
Route::get('/evenement/show/{id}', [EvenementController::class, 'show'])->whereNumber('id')->name('pageEvenement');
Route::get('/evenement/edit/{id}', [EvenementController::class, 'edit'])->whereNumber('id')->name('pageModificationEvenement');

// Routes POST
Route::post('/compte/update/{id}', [ModifierCompteController::class, 'update'])->whereNumber('id')->name('modifierCompte');
Route::post('/delete/{id}', [SupprimerCompteController::class, 'delete'])->name('effacerCompte')->whereNumber('id');
// Routes POST (traitement de données provenant des pages webs)
Route::post('/compte/update/{id}', [ProfilController::class, 'update'])->whereNumber('id')->name('modifierCompte');
Route::post('/compte/delete/{id}', [ProfilSuppressionController::class, 'delete'])->whereNumber('id')->name('effacerCompte');

Route::post('/evenement/store', [EvenementCreationController::class, 'store'])->name('creerEvenement');
Route::post('/evenement/update/{id}', [EvenementController::class, 'update'])->whereNumber('id')->name('modifierEvenement');
Route::post('/evenement/delete/{id}', [EvenementController::class, 'delete'])->name('effacerEvenememt')->whereNumber('id');

Route::post('/evenement/update/{id}', [ModifierEvenementController::class, 'update'])->whereNumber('id')->name('modifierEvenement');

