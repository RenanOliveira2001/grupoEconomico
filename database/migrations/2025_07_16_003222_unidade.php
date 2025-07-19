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
        Schema::create('unidades', function(Blueprint $table){
            $table->id();
            $table->text('nome_fantasia');
            $table->text('razao_social');
            $table->text('cnpj');
            $table->foreignId('bandeira')
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
        Schema::dropIfExists('unidades');
    }
};
