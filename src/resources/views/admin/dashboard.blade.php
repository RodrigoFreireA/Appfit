@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard do Admin</h1>
    <p>Gerenciar usuários e treinos.</p>

    <div class="mb-4">
        <h2>Gerenciar Professores</h2>
        <a href="{{ route('professores.create') }}" class="btn btn-primary">Criar Professor</a>
        <a href="{{ route('professores.index') }}" class="btn btn-secondary">Listar Professores</a>
    </div>

    <div class="mb-4">
        <h2>Gerenciar Alunos</h2>
        <a href="{{ route('alunos.create') }}" class="btn btn-primary">Criar Aluno</a>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Listar Alunos</a>
    </div>

    <div class="mb-4">
        <h2>Gerenciar Treinos</h2>
        <a href="{{ route('treinos.create') }}" class="btn btn-primary">Criar Treino</a>
        <a href="{{ route('treinos.index') }}" class="btn btn-secondary">Listar Treinos</a>
    </div>
</div>
@endsection
