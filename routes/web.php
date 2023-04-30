<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuario', UsuarioController::class);

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth',[LoginController::class,'auth'])->name('login.auth');

Route::get('/cadastro', [LoginController::class, 'create'])->name('login.cadastro');

Route::get('/adm/dashboard', [DashboardController::class, 'index'])->name('adm.dashboard');