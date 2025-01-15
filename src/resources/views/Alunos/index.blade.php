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
                <th>Ações</th>
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
                <td>
                    <!-- Botão para criar um treino específico para o aluno -->
                    <a href="{{ route('treinos.create', $aluno->id) }}" class="btn btn-success btn-sm mb-1">
                        Criar Treino
                    </a>

                    <!-- Botão para associar treino existente ao aluno -->
                    <a href="{{ route('alunos.treinos.associate.form', $aluno->id) }}" class="btn btn-warning btn-sm">
                        Associar Treino
                    </a>


                    <!-- Botão para excluir o aluno -->
                    <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">
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