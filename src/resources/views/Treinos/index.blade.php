@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($aluno))
        <h1>Treinos de {{ $aluno->nome }}</h1>
    @else
        <h1>Lista de Todos os Treinos</h1>
    @endif

    <a href="{{ route('treinos.create') }}" class="btn btn-primary mb-3">Criar Novo Treino</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Carga</th>
                <th>Repetições</th>
                <th>Descanso</th>
                <th>Aluno</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($treinos as $treino)
            <tr>
                <td>{{ $treino->descricao }}</td>
                <td>{{ $treino->carga }} kg</td>
                <td>{{ $treino->repeticoes }}</td>
                <td>{{ $treino->descanso }} seg</td>
                <td>{{ $treino->aluno->nome ?? 'N/A' }}</td>
                <td>
                    <!-- Botões de ação -->
                    <form action="{{ route('treinos.destroy', $treino->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este treino?')">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
