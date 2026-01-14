<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Carbon\Carbon;

use App\Models\Rutina;
use App\Models\Ejercicio;
use App\Models\RutinaEjercicio;
use App\Models\SemanaEntrenamiento;
use App\Models\RutinaEjercicioSemana;
use App\Models\RutinaEjercicioSerie;

class GymSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Crear catálogo de ejercicios
        /** @var Collection<int, Ejercicio> $ejercicios */
        $ejercicios = Ejercicio::factory()->count(25)->create();

        // 2) Crear rutinas
        /** @var Collection<int, Rutina> $rutinas */
        $rutinas = Rutina::factory()->count(7)->create();

        // 3) Crear semanas (histórico)
        $semanas = collect();
        $start = Carbon::now()->startOfWeek(Carbon::MONDAY)->subWeeks(11); // 12 semanas contando la actual

        for ($i = 0; $i < 12; $i++) {
            $inicio = $start->copy()->addWeeks($i)->startOfWeek(Carbon::MONDAY);
            $fin = $inicio->copy()->endOfWeek(Carbon::SUNDAY);

            $semanas->push(
                SemanaEntrenamiento::firstOrCreate([
                    'fecha_inicio' => $inicio->toDateString(),
                    'fecha_fin' => $fin->toDateString(),
                ])
            );
        }

        // 4) Para cada rutina, asignar 4-7 ejercicios en la plantilla (pivot)
        foreach ($rutinas as $rutina) {
            $seleccion = $ejercicios->random(rand(4, 7))->values();

            foreach ($seleccion as $idx => $ejercicio) {
                RutinaEjercicio::factory()->create([
                    'rutina_id' => $rutina->id,
                    'ejercicio_id' => $ejercicio->id,
                    'orden' => $idx + 1,
                ]);
            }
        }

        // 5) Generar logs semanales por ejercicio (y series detalladas)
        //    Creamos registros para algunas semanas (no todas) para que parezca real.
        foreach ($semanas as $semana) {

            // elija 3-6 rutinas que "se entrenaron" esa semana
            $rutinasSemana = $rutinas->random(rand(3, 6));

            foreach ($rutinasSemana as $rutina) {
                $plantilla = RutinaEjercicio::query()
                    ->where('rutina_id', $rutina->id)
                    ->orderBy('orden')
                    ->get();

                foreach ($plantilla as $re) {

                    // 80% probabilidad de que se haya hecho ese ejercicio esa semana
                    if (rand(1, 100) > 80) {
                        continue;
                    }

                    $log = RutinaEjercicioSemana::factory()->create([
                        'rutina_id' => $rutina->id,
                        'ejercicio_id' => $re->ejercicio_id,
                        'semana_entrenamiento_id' => $semana->id,
                    ]);

                    // Si quiere series detalladas: crear N series según series_realizadas u objetivo
                    $numSeries = $log->series_realizadas ?? $re->series_objetivo ?? rand(3, 5);

                    // Peso base (para que las series tengan coherencia)
                    $pesoBase = $log->peso_kg ?? rand(20, 80);

                    for ($i = 1; $i <= $numSeries; $i++) {
                        // pequeña variación por serie (fatiga)
                        $pesoSerie = max(0, (float)$pesoBase - (($i - 1) * rand(0, 2)));

                        RutinaEjercicioSerie::factory()->create([
                            'rutina_ejercicio_semana_id' => $log->id,
                            'numero_serie' => $i,
                            'peso_kg' => $pesoSerie,
                        ]);
                    }
                }
            }
        }
    }
}
