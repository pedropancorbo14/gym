<?php

namespace Database\Factories;

use App\Models\RutinaEjercicioSemana;
use Illuminate\Database\Eloquent\Factories\Factory;

class RutinaEjercicioSemanaFactory extends Factory
{
    protected $model = RutinaEjercicioSemana::class;

    public function definition(): array
    {
        // rutina_id, ejercicio_id, semana_entrenamiento_id se los ponemos desde el Seeder
        $series = $this->faker->numberBetween(3, 5);
        $reps = $this->faker->randomElement([6, 8, 10, 12, 15]);

        return [
            'series_realizadas' => $this->faker->boolean(85) ? $series : null,
            'reps_realizadas' => $this->faker->boolean(85) ? $reps : null,
            'peso_kg' => $this->faker->boolean(85) ? $this->faker->randomFloat(2, 10, 120) : null,
            'descanso_segundos_real' => $this->faker->boolean(70) ? $this->faker->randomElement([60, 90, 120, 150, 180]) : null,
            'notas' => $this->faker->boolean(20) ? $this->faker->sentence(8) : null,
        ];
    }
}
