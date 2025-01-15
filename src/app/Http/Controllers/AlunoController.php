<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Professor;
use Illuminate\Http\Request;
use App\Models\Treino;

class AlunoController extends Controller
{
    // Lista todos os alunos
    public function index()
    {
        $alunos = Aluno::with('professor')->get();
        return view('alunos.index', compact('alunos'));
        // Carregar os alunos com os treinos associados
        $alunos = Aluno::with('treinos')->get();
        return view('alunos.index', compact('alunos'));
    }

    // Exibe o formulário para criar um aluno
    public function create()
    {
        $professores = Professor::all();
        return view('alunos.create', compact('professores'));
    }

    // Salva um novo aluno no banco de dados
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'professor_id' => 'required|exists:professores,id',
        ]);

        Aluno::create($validated);

        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function destroy($id)
    {
        Aluno::destroy($id);

        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }

    public function associateTreino(Request $request, $alunoId)
    {
        $validated = $request->validate([
            'treino_id' => 'required|exists:treinos,id',
        ]);

        $treino = Treino::findOrFail($validated['treino_id']);
        $treino->aluno_id = $alunoId;
        $treino->save();

        return redirect()->route('alunos.index')->with('success', 'Treino associado com sucesso!');
    }

    public function associateTreinoForm($alunoId)
    {
        $aluno = Aluno::findOrFail($alunoId);
        $treinos = Treino::whereNull('aluno_id')->get(); // Filtra treinos não associados
        return view('alunos.associate_treino', compact('aluno', 'treinos'));
    }
}
