<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\CreerEvenementController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ModifierCompteController;
use App\Http\Controllers\ProfilController;
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

Route::get('/', [ConnexionController::class, 'show'])->name('pageConnexion');

/**
 * URL à utiliser pour afficher les pages correspondantes / déconnecter un utilisateur
 */
Route::get('/inscription', [InscriptionController::class, 'show'])->name('pageInscription');
Route::get('/connexion', [ConnexionController::class, 'show'])->name('pageConnexion');
Route::get('/compte/edit/{id}', [ModifierCompteController::class, 'edit'])->whereNumber('id')->name('pageModificationCompte');
Route::get('/compte/show/{id}', [ModifierCompteController::class, 'show'])->whereNumber('id')->name('pageProfil');

Route::get('/deconnexion', DeconnexionController::class)->name('deconnexion');

Route::get('/evenement/create', [CreerEvenementController::class, 'show'])->name('pageCreationEvenement');



// Routes POST (traitement de données provenant des pages webs)
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscrireCompte');
Route::post('/connexion', [ConnexionController::class, 'authenticate'])->name('connecterCompte');
Route::post('/compte/update/{id}', [ModifierCompteController::class, 'update'])->whereNumber('id')->name('modifierCompte');
Route::post('/delete/{id}', [SupprimerCompteController::class])->name('effacerCompte')->whereNumber('id');

Route::post('/evenement/store', [CreerEvenementController::class, 'store'])->name('creerEvenement');

