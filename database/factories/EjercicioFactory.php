<?php

namespace Database\Factories;

use App\Models\Ejercicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EjercicioFactory extends Factory
{
    protected $model = Ejercicio::class;

    public function definition(): array
    {
        $grupos = ['Pecho', 'Espalda', 'Piernas', 'Hombros', 'Bíceps', 'Tríceps', 'Core', 'Cardio'];

        return [
            'nombre' => ucfirst($this->faker->words(2, true)),
            'grupo_muscular' => $this->faker->randomElement($grupos),
            'descripcion' => $this->faker->boolean(60) ? $this->faker->sentence(12) : null,
        ];
    }
}
