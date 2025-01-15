<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    // Permitir preenchimento em massa para os campos abaixo
    protected $fillable = ['nome', 'professor_id'];

    // Relação: Um Aluno pertence a um Professor
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    // Relação: Um Aluno tem muitos Treinos
    public function treinos()
    {
        return $this->hasMany(Treino::class);
    }

}
