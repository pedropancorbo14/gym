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
        Schema::create('rutina_ejercicios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('rutina_id')->constrained('rutinas')->cascadeOnDelete();
            $table->foreignId('ejercicio_id')->constrained('ejercicios')->cascadeOnDelete();

            $table->unsignedSmallInteger('orden')->default(1);

            // “objetivo/plan”
            $table->unsignedSmallInteger('series_objetivo')->nullable();
            $table->unsignedSmallInteger('reps_objetivo')->nullable();
            $table->unsignedSmallInteger('descanso_segundos_objetivo')->nullable();

            $table->timestamps();

            $table->unique(['rutina_id', 'ejercicio_id']); // evita duplicados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_ejercicios');
    }
};
