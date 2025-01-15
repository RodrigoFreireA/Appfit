@extends('layouts.app')
@csrf
@section('content')
<div class="container">
    <h1>Dashboard do Administrador</h1>
    <ul>
        <li><a href="{{ route('professores.index') }}">Gerenciar Professores</a></li>
        <li><a href="{{ route('alunos.index') }}">Gerenciar Alunos</a></li>
        <li><a href="#">Gerenciar Treinos</a></li>
    </ul>
</div>
@endsection


