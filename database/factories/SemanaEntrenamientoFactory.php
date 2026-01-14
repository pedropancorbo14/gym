<?php

namespace Database\Factories;

use App\Models\SemanaEntrenamiento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class SemanaEntrenamientoFactory extends Factory
{
    protected $model = SemanaEntrenamiento::class;

    public function definition(): array
    {
        // Semana aleatoria, alineada a lunes
        $start = Carbon::now()
            ->subWeeks($this->faker->numberBetween(0, 20))
            ->startOfWeek(Carbon::MONDAY);

        return [
            'fecha_inicio' => $start->toDateString(),
            'fecha_fin' => $start->copy()->endOfWeek(Carbon::SUNDAY)->toDateString(),
        ];
    }
}
