@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Novo Aluno</h1>
    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="professor_id" class="form-label">Professor</label>
            <select name="professor_id" id="professor_id" class="form-control" required>
                @foreach($professores as $professor)
                <option value="{{ $professor->id }}">{{ $professor->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
