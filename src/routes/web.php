<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\CreerEvenementController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\RecuperationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ModifierCompteController;
use App\Http\Controllers\SupprimerCompteController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ModifierEvenementController;
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






Route::get('/compte/edit/{id}', [ModifierCompteController::class, 'edit'])->whereNumber('id')->name('pageModificationCompte');
Route::get('/compte/show/{id}', [ModifierCompteController::class, 'show'])->whereNumber('id')->name('pageProfil');


Route::get('/evenement/create', [CreerEvenementController::class, 'show'])->name('pageCreationEvenement');
Route::get('/evenement/show/{id}', [ModifierEvenementController::class, 'show'])->whereNumber('id')->name('pageEvenement');
Route::get('/evenement/edit/{id}', [ModifierEvenementController::class, 'edit'])->whereNumber('id')->name('pageModificationEvenement');

// Routes POST
Route::post('/compte/update/{id}', [ModifierCompteController::class, 'update'])->whereNumber('id')->name('modifierCompte');
Route::post('/delete/{id}', [SupprimerCompteController::class, 'delete'])->name('effacerCompte')->whereNumber('id');

Route::post('/evenement/store', [CreerEvenementController::class, 'store'])->name('creerEvenement');

Route::post('/evenement/update/{id}', [ModifierEvenementController::class, 'update'])->whereNumber('id')->name('modifierEvenement');

