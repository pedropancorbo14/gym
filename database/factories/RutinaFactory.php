<?php

namespace Database\Factories;

use App\Models\Rutina;
use Illuminate\Database\Eloquent\Factories\Factory;

class RutinaFactory extends Factory
{
    protected $model = Rutina::class;

    public function definition(): array
    {
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        $nombres = [
            'Pecho',
            'Espalda',
            'Pierna',
            'Hombro',
            'Brazos',
            'Full Body',
            'Core'
        ];

        return [
            'nombre' => $this->faker->randomElement($nombres) . ' ' . $this->faker->randomNumber(1),
            'descripcion' => $this->faker->boolean(70) ? $this->faker->sentence(10) : null,
            'dia_semana' => $this->faker->randomElement($dias),
        ];
    }
}
