@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Treinos de {{ $aluno->nome }}</h1>
    <a href="{{ route('treinos.create', $aluno->id) }}" class="btn btn-primary mb-3">Adicionar Novo Treino</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Carga</th>
                <th>Repetições</th>
                <th>Descanso</th>
                <th>Observações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($treinos as $treino)
            <tr>
                <td>{{ $treino->descricao }}</td>
                <td>{{ $treino->carga }} kg</td>
                <td>{{ $treino->repeticoes }}</td>
                <td>{{ $treino->descanso }} segundos</td>
                <td>{{ $treino->observacoes }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
