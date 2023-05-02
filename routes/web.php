<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\CandidatoController;
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
    return view('login.form');
});

Route::post('/usuarios', [UsuarioController::class, 'storeWithCandidato'])->name('usuarios.store');
Route::resource('usuario', UsuarioController::class);

Route::view('/login', 'login.form')->name('login');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/cadastro', [UsuarioController::class, 'create'])->name('login.cadastro');

Route::get('/adm/dashboard', [DashboardController::class, 'index'])->name('adm.dashboard');

// Inserir metodo de autenticação manual
// Route::middleware(['auth'])->group(function () {

    // candidatos
    Route::resource('/candidatos', CandidatoController::class, ['names' => 'candidatos']);
    // cadastro
    Route::post('/candidatos/cadastro', [CandidatoController::class, 'create'])->name('candidatos.cadastro');
    // editar
    Route::get('/candidatos/{id}/editar', [CandidatoController::class, 'edit'])->name('candidatos.editar');
    // Atualizar
    Route::patch('/candidatos/{id}/editar', [CandidatoController::class, 'update'])->name('candidatos.atualizar');
    // Deletar
    Route::delete('/candidatos/{id}', [CandidatoController::class, 'destroy'])->name('candidatos.delete');

    // vagas
    Route::resource('/vagas', VagaController::class, ['names' => 'vagas']);
    // cadastro
    Route::post('/vagas/cadastro', [VagaController::class, 'create'])->name('vagas.cadastro');
    // editar
    Route::get('/vagas/{id}/editar', [VagaController::class, 'edit'])->name('vagas.editar');
    // Atualizar
    Route::patch('/vagas/{id}/editar', [VagaController::class, 'update'])->name('vagas.atualizar');
    // Deletar
    Route::delete('/vagas/{id}', [VagaController::class, 'destroy'])->name('vagas.delete');
    // Atualizar Status da vaga
    Route::post('/vagas/{id}/atualizar-status', [VagaController::class, 'atualizarStatus'])->name('vagas.atualizar-status');
// });
