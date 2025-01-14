<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    // Lista todos os professores
    public function index() {
        $professores = Professor::all();
        return view('professores.index', compact('professores'));
    }

    // Exibe o formulário para criar um professor
    public function create() {
        return view('professores.create');
    }

    // Salva um novo professor no banco de dados
    public function store(Request $request) {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:professores',
            'senha' => 'required|min:6',
        ]);

        Professor::create([
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'senha' => bcrypt($validated['senha']),
        ]);

        return redirect()->route('professores.index')->with('success', 'Professor cadastrado com sucesso!');
    }
    
    //exibe a listagem de alunos
    public function alunos($id) {
        $professor = Professor::with('alunos')->findOrFail($id);
        return view('professores.alunos', compact('professor'));
    }
    
}
