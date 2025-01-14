@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Alunos</h1>
    <a href="{{ route('alunos.create') }}" class="btn btn-primary mb-3">Adicionar Novo Aluno</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Professor</th>
                <th>Treinos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->professor->nome }}</td>
                <td>
                    @if($aluno->treinos->isEmpty())
                        <span>Sem treinos cadastrados</span>
                    @else
                        <ul>
                            @foreach($aluno->treinos as $treino)
                            <li>
                                <strong>{{ $treino->descricao }}</strong>
                                ({{ $treino->carga }} kg, {{ $treino->repeticoes }} repetições, {{ $treino->descanso }} seg)
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
