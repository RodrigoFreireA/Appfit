@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Professores</h1>
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
                    <a href="{{ route('professores.alunos', $professor->id) }}" class="btn btn-primary">
                        Ver Alunos
                    </a>
                </td>
                <td>
                    <form action="{{ route('professores.destroy', $professor->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este professor?')">
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