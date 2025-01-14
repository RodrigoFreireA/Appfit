@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo ao Dashboard</h1>
    <p>Você está autenticado!</p>

    
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total de Professores</h5>
                <p class="card-text">{{ \App\Models\Professor::count() }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total de Alunos</h5>
                <p class="card-text">{{ \App\Models\Aluno::count() }}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

