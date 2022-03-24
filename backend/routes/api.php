<?php

use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

Route::controller(UserController::class)->group(function () {
	Route::middleware('auth:sanctum')->post('/users', 'getUsers');
	Route::post('/users/{id}', 'getUserById');
	Route::post('/user/create', 'create');
	Route::post('/users/{id}/update', 'update');
	Route::post('/users/{id}/connect', 'connect');
	Route::post('/user/update', 'update');
	Route::post('/user/connect', 'connect');
	Route::post('/user/disconnect', 'connect');
});


