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
        Schema::create('treinos', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->unsignedBigInteger('aluno_id'); // Chave estrangeira
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->text('descricao'); // Descrição do treino
            $table->integer('carga')->nullable(); // Carga do exercício
            $table->integer('repeticoes')->nullable(); // Número de repetições
            $table->integer('descanso')->nullable(); // Tempo de descanso em segundos
            $table->text('observacoes')->nullable(); // Observações adicionais
            $table->timestamps(); // Campos created_at e updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treinos');
    }
};
