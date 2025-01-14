@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Alunos do Professor {{ $professor->nome }}</h1>
    <a href="{{ route('professores.index') }}" class="btn btn-secondary mb-3">Voltar</a>
    @if($professor->alunos->isEmpty())
        <p>Não há alunos associados a este professor.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Frequência</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professor->alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->frequencia ?? 'Não definida' }}</td>
                    <td>
                        <a href="{{ route('treinos.index', $aluno->id) }}" class="btn btn-primary">
                            Ver Treinos
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
