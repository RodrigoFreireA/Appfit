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
        Schema::create('professores', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('nome'); // Nome do professor
            $table->string('email')->unique(); // E-mail do professor
            $table->string('senha'); // Senha criptografada
            $table->timestamps(); // Campos created_at e updated_at
        });
        
    }

    



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professores');
    }
};
