@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Treino para {{ $aluno->nome }}</h1>
    <form action="{{ route('treinos.store', $aluno->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
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
            <textarea name="observacoes" id="observacoes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
