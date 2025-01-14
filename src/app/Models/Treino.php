<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;

    // Permitir preenchimento em massa para os campos abaixo
    protected $fillable = ['descricao', 'carga', 'repeticoes', 'descanso', 'observacoes', 'aluno_id'];

    // Relação: Um Treino pertence a um Aluno
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
