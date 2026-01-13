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
        Schema::create('rutina_ejercicio_semanas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('rutina_id')->constrained('rutinas')->cascadeOnDelete();
            $table->foreignId('ejercicio_id')->constrained('ejercicios')->cascadeOnDelete();
            $table->foreignId('semana_entrenamiento_id')->constrained('semanas_entrenamiento')->cascadeOnDelete();

            // “real”
            $table->unsignedSmallInteger('series_realizadas')->nullable();
            $table->unsignedSmallInteger('reps_realizadas')->nullable();
            $table->decimal('peso_kg', 6, 2)->nullable(); // 9999.99kg sobra, pero ok
            $table->unsignedSmallInteger('descanso_segundos_real')->nullable();

            $table->text('notas')->nullable();

            $table->timestamps();

            // 1 registro por semana para ese ejercicio en esa rutina
            $table->unique(['rutina_id', 'ejercicio_id', 'semana_entrenamiento_id'], 'rut_ej_sem_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_ejercicio_semanas');
    }
};
