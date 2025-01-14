<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('nome'); // Nome do aluno
            $table->unsignedBigInteger('professor_id'); // Chave estrangeira
            $table->foreign('professor_id')->references('id')->on('professores')->onDelete('cascade');
            $table->string('frequencia')->nullable(); // Exemplo: "3x por semana"
            $table->timestamps(); // Campos created_at e updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
