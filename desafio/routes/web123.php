<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'createUsers'])->middleware('auth');
Route::get('/users/show', [UserController::class, 'showUsers']);
Route::post('/users', [UserController::class, 'storeUsers']);
Route::delete('/users/{id}', [UserController::class, 'destroyUsers'])->middleware('auth');
Route::get('/perfil/create', [UserController::class, 'createPerfil'])->middleware('auth');
Route::get('/perfil/show', [UserController::class, 'showPerfil']);
Route::post('/perfil', [UserController::class, 'storePerfil']);
Route::delete('/perfil/{id}', [UserController::class, 'destroyPerfil'])->middleware('auth');
Route::get('/perfil/edit/{id}', [UserController::class, 'editPerfil'])->middleware('auth');
Route::put('/perfil/update/{id}', [UserController::class, 'updatePerfil'])->middleware('auth');
Route::post('/perfil/perfilUsers', [UserController::class, 'storePerfilUsers'])->middleware('auth');
Route::delete('/perfil/perfilUsers/{user_id}', [UserController::class, 'destroyPerfilUsers'])->middleware('auth');


/*
Route::get('/', function () {
    return view('home');
});

Route::get('/cad_usu', function () {
    return view('cad_usu');
});

Route::get('/cad_perfil', function () {
    return view('cad_perfil');
});

*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
