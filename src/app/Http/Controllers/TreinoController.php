<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treino;
use App\Models\Aluno;

class TreinoController extends Controller
{
    public function index($alunoId = null)
    {
        if ($alunoId) {
            $aluno = Aluno::findOrFail($alunoId);
            $treinos = $aluno->treinos;
            return view('treinos.index', compact('aluno', 'treinos'));
        } else {
            // Listar todos os treinos
            $treinos = Treino::all();
            return view('treinos.index', compact('treinos'));
        }
    }


    public function create(Request $request, $alunoId = null)
    {
        $aluno = $alunoId ? Aluno::findOrFail($alunoId) : null;
        $alunos = Aluno::all(); // Lista de alunos para o admin escolher
        return view('treinos.create', compact('aluno', 'alunos'));
    }


    public function store(Request $request, $alunoId = null)
    {
        $validated = $request->validate([
            'descricao' => 'required|string',
            'carga' => 'nullable|integer',
            'repeticoes' => 'nullable|integer',
            'descanso' => 'nullable|integer',
            'observacoes' => 'nullable|string',
            'aluno_id' => 'nullable|exists:alunos,id', // Certifique-se de validar o aluno_id, caso venha no request
        ]);

        // Se $alunoId for fornecido pela URL, ele tem prioridade
        $validated['aluno_id'] = $alunoId ?? $request->input('aluno_id');

        // Certifique-se de que aluno_id não é nulo antes de salvar
        if (!$validated['aluno_id']) {
            return redirect()->back()->withErrors(['aluno_id' => 'O campo aluno é obrigatório.']);
        }

        Treino::create($validated);

        return redirect()->route('treinos.index', $validated['aluno_id'])->with('success', 'Treino cadastrado com sucesso!');
    }
}
