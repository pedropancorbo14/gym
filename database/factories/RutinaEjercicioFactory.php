<?php

namespace Database\Factories;

use App\Models\RutinaEjercicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class RutinaEjercicioFactory extends Factory
{
    protected $model = RutinaEjercicio::class;

    public function definition(): array
    {
        return [
            // rutina_id y ejercicio_id se los ponemos desde el Seeder
            'orden' => $this->faker->numberBetween(1, 10),
            'series_objetivo' => $this->faker->numberBetween(3, 5),
            'reps_objetivo' => $this->faker->randomElement([6, 8, 10, 12, 15]),
            'descanso_segundos_objetivo' => $this->faker->randomElement([60, 90, 120, 150, 180]),
        ];
    }
}
