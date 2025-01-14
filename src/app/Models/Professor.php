<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    // Permitir preenchimento em massa para os campos abaixo
    protected $fillable = ['nome', 'email', 'senha'];
    protected $table = 'professores';

    // Relação: Um Professor tem muitos Alunos
    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}
