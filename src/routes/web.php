<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ModifierCompteController;
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

Route::get('/', [ConnexionController::class, 'show'])->name('pageAccueil');

/**
 * URL à utiliser pour afficher les pages correspondantes / déconnecter un utilisateur
 */
Route::get('/inscription', [InscriptionController::class, 'show'])->name('pageInscription');
Route::get('/connexion', [ConnexionController::class, 'show'])->name('pageConnexion');
Route::get('/compte/modifier', [ModifierCompteController::class, 'show'])->name('pageModificationCompte');

Route::get('/deconnexion', DeconnexionController::class)->name('deconnexion');

// Routes POST (traitement de données provenant des pages webs)
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscrireCompte');
Route::post('/connexion', [ConnexionController::class, 'authenticate'])->name('connecterCompte');
Route::get('/compte/update', [ModifierCompteController::class, 'update'])->name('modifierCompte');

// Test
