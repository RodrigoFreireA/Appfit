@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Professores</h1>
    <a href="{{ route('professores.create') }}" class="btn btn-primary mb-3">Adicionar Novo Professor</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Alunos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professores as $professor)
            <tr>
                <td>{{ $professor->nome }}</td>
                <td>{{ $professor->email }}</td>
                <td>
                    <a href="{{ route('professores.alunos', $professor->id) }}" class="btn btn-info">
                        Ver Alunos
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
