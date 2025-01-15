@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($aluno) ? 'Criar Treino para ' . $aluno->nome : 'Criar Novo Treino' }}</h1>
    <form action="{{ isset($aluno) ? route('treinos.store', $aluno->id) : route('treinos.store') }}" method="POST">
        @csrf

        <!-- Campo aluno_id oculto se já existir um aluno selecionado -->
        @if(isset($aluno))
            <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">
        @else
            <div class="mb-3">
                <label for="aluno_id" class="form-label">Aluno</label>
                <select name="aluno_id" id="aluno_id" class="form-control" required>
                    <option value="">Selecione um aluno</option>
                    @foreach($alunos as $a)
                        <option value="{{ $a->id }}">{{ $a->nome }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <!-- Outros campos do treino -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="carga" class="form-label">Carga (kg)</label>
            <input type="number" name="carga" id="carga" class="form-control">
        </div>

        <div class="mb-3">
            <label for="repeticoes" class="form-label">Repetições</label>
            <input type="number" name="repeticoes" id="repeticoes" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descanso" class="form-label">Descanso (segundos)</label>
            <input type="number" name="descanso" id="descanso" class="form-control">
        </div>

        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Treino</button>
    </form>
</div>
@endsection
