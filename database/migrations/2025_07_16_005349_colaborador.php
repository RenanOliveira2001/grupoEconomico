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
        Schema::create('colaboradores', function(Blueprint $table){
            $table->id();
            $table->text('nome');
            $table->string('email')->unique();
            $table->text('CPF');
            $table->foreignId('unidade')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->date('dt_criacao');
            $table->dateTime('ultima_atualizacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
