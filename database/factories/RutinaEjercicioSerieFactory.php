<?php

namespace Database\Factories;

use App\Models\RutinaEjercicioSerie;
use Illuminate\Database\Eloquent\Factories\Factory;

class RutinaEjercicioSerieFactory extends Factory
{
    protected $model = RutinaEjercicioSerie::class;

    public function definition(): array
    {
        return [
            // rutina_ejercicio_semana_id se lo ponemos desde el Seeder
            'numero_serie' => 1,
            'repeticiones' => $this->faker->randomElement([5, 6, 8, 10, 12, 15]),
            'peso_kg' => $this->faker->randomFloat(2, 10, 120),
            'descanso_segundos' => $this->faker->randomElement([60, 90, 120, 150, 180]),
        ];
    }
}
