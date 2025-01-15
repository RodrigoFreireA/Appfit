<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('professores', function (Blueprint $table) {
            $table->string('role')->default('professor'); // Define o papel padrão como 'professor'
        });
    }

    public function down()
    {
        Schema::table('professores', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
