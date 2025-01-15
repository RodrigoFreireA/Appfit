<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\AuthController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    // Dashboard por roles
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('can:isAdmin');

    Route::get('/professor/dashboard', function () {
        return view('professores.index');
    })->name('professor.dashboard')->middleware('can:isProfessor');

    Route::get('/aluno/dashboard', function () {
        return view('alunos.index');
    })->name('aluno.dashboard')->middleware('can:isAluno');

    // Rotas específicas para Admin
    Route::middleware(['can:isAdmin'])->group(function () {
        // Rotas para professores
        Route::prefix('professores')->name('professores.')->group(function () {
            Route::get('/', [ProfessorController::class, 'index'])->name('index');
            Route::get('/create', [ProfessorController::class, 'create'])->name('create');
            Route::post('/', [ProfessorController::class, 'store'])->name('store');
            Route::delete('/{professor}', [ProfessorController::class, 'destroy'])->name('destroy');
            Route::get('/{id}/alunos', [ProfessorController::class, 'alunos'])->name('alunos');
        });

        // Rotas para alunos
        Route::prefix('alunos')->name('alunos.')->group(function () {
            Route::get('/', [AlunoController::class, 'index'])->name('index');
            Route::get('/create', [AlunoController::class, 'create'])->name('create');
            Route::post('/', [AlunoController::class, 'store'])->name('store');
            Route::delete('/{aluno}', [AlunoController::class, 'destroy'])->name('destroy');

            // Atualização de roles
            Route::get('/roles', [AlunoController::class, 'updateRoles'])->name('roles');

            // Associar treino a aluno
            Route::get('/{aluno}/treinos/associate', [AlunoController::class, 'associateTreinoForm'])->name('treinos.associate.form');
            Route::post('/{aluno}/treinos/associate', [AlunoController::class, 'associateTreino'])->name('treinos.associate');

            // Listar treinos de aluno
            Route::get('/{aluno}/treinos', [TreinoController::class, 'index'])->name('treinos.index');
        });



        // Rotas para treinos
        Route::prefix('treinos')->name('treinos.')->group(function () {
            Route::get('/', [TreinoController::class, 'index'])->name('index');
            Route::get('/create/{aluno?}', [TreinoController::class, 'create'])->name('create');
            Route::get('/treinos/{aluno?}', [TreinoController::class, 'index'])->name('treinos.index');
            Route::post('/', [TreinoController::class, 'store'])->name('store');
            Route::delete('/{treino}', [TreinoController::class, 'destroy'])->name('destroy');
        });
    });

    // Rotas específicas para professores e alunos (não admin)
    Route::prefix('alunos')->name('alunos.')->group(function () {
        Route::get('/{aluno}/treinos', [TreinoController::class, 'index'])->name('treinos.index');
    });
});
