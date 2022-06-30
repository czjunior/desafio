<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'login']);
Route::get('/home', [UserController::class, 'home']);
Route::post('/auth', [UserController::class, 'auth']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/users/create', [UserController::class, 'createUsers']);
Route::get('/users/show', [UserController::class, 'showUsers']);
Route::post('/users', [UserController::class, 'storeUsers']);
Route::get('/users/edit/{id}', [UserController::class, 'editUsers'])->middleware('auth');
Route::put('/users/update/{id}', [UserController::class, 'updateUsers'])->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroyUsers'])->middleware('auth');
Route::get('/perfil/create', [UserController::class, 'createPerfil'])->middleware('auth');
Route::get('/perfil/show', [UserController::class, 'showPerfil']);
Route::post('/perfil', [UserController::class, 'storePerfil']);
Route::delete('/perfil/{id}', [UserController::class, 'destroyPerfil'])->middleware('auth');
Route::get('/perfil/edit/{id}', [UserController::class, 'editPerfil'])->middleware('auth');
Route::put('/perfil/update/{id}', [UserController::class, 'updatePerfil'])->middleware('auth');
Route::post('/perfil/perfilUsers', [UserController::class, 'storePerfilUsers'])->middleware('auth');
Route::delete('/perfil/perfilUsers/{user_id}', [UserController::class, 'destroyPerfilUsers'])->middleware('auth');