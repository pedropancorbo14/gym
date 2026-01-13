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
        Schema::create('rutina_ejercicio_series', function (Blueprint $table) {
            $table->id();

            $table->foreignId('rutina_ejercicio_semana_id')
                ->constrained('rutina_ejercicio_semanas')
                ->cascadeOnDelete();

            $table->unsignedSmallInteger('numero_serie'); // 1,2,3...
            $table->unsignedSmallInteger('repeticiones')->nullable();
            $table->decimal('peso_kg', 6, 2)->nullable();
            $table->unsignedSmallInteger('descanso_segundos')->nullable();

            $table->timestamps();

            $table->unique(['rutina_ejercicio_semana_id', 'numero_serie'], 'uniq_semana_serie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_ejercicio_series');
    }
};
