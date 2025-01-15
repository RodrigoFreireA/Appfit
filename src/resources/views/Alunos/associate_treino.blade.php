@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Associar Treino ao Aluno: {{ $aluno->nome }}</h1>

    <form action="{{ route('alunos.treinos.associate', $aluno->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="treino_id" class="form-label">Selecionar Treino</label>
            <select name="treino_id" id="treino_id" class="form-control" required>
                <option value="">Selecione um treino</option>
                @foreach($treinos as $treino)
                    <option value="{{ $treino->id }}">{{ $treino->descricao }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Associar Treino</button>
    </form>
</div>
@endsection
