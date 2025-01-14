<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

//Rotas para professores
Route::get('/professores', [ProfessorController::class, 'index'])->name('professores.index');
Route::get('/professores/create', [ProfessorController::class, 'create'])->name('professores.create');
Route::post('/professores', [ProfessorController::class, 'store'])->name('professores.store');
Route::get('/professores/{id}/alunos', [ProfessorController::class, 'alunos'])->name('professores.alunos');//rota para exibição da lista de alunos

//Rotas para Alunos
Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');
Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');

//Rotas para treinos
Route::get('/alunos/{aluno}/treinos', [TreinoController::class, 'index'])->name('treinos.index');
Route::get('/alunos/{aluno}/treinos/create', [TreinoController::class, 'create'])->name('treinos.create');
Route::post('/alunos/{aluno}/treinos', [TreinoController::class, 'store'])->name('treinos.store');

//Rotas para login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
