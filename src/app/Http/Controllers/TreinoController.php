<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treino;
use App\Models\Aluno;

class TreinoController extends Controller
{
    public function index($alunoId) {
        $aluno = Aluno::findOrFail($alunoId);
        $treinos = $aluno->treinos;
        return view('treinos.index', compact('aluno', 'treinos'));
    }

    public function create($alunoId) {
        $aluno = Aluno::findOrFail($alunoId);
        return view('treinos.create', compact('aluno'));
    }

    public function store(Request $request, $alunoId) {
        $validated = $request->validate([
            'descricao' => 'required',
            'carga' => 'nullable|integer',
            'repeticoes' => 'nullable|integer',
            'descanso' => 'nullable|integer',
            'observacoes' => 'nullable|string',
        ]);

        Treino::create(array_merge($validated, ['aluno_id' => $alunoId]));

        return redirect()->route('treinos.index', $alunoId)->with('success', 'Treino cadastrado com sucesso!');
    }
}
