<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Professor;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    // Lista todos os alunos
    public function index() {
        $alunos = Aluno::with('professor')->get();
        return view('alunos.index', compact('alunos'));
         // Carregar os alunos com os treinos associados
        $alunos = Aluno::with('treinos')->get();
        return view('alunos.index', compact('alunos'));
    }

    // Exibe o formulário para criar um aluno
    public function create() {
        $professores = Professor::all();
        return view('alunos.create', compact('professores'));
    }

    // Salva um novo aluno no banco de dados
    public function store(Request $request) {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'professor_id' => 'required|exists:professores,id',
        ]);

        Aluno::create($validated);

        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso!');
    }
}
