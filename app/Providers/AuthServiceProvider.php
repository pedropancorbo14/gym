<?php

namespace App\Providers;

use App\Models\Ejercicio;
use App\Models\Rutina;
use App\Models\RegistroSemanal;
use App\Models\RutinaEjercicio;
use App\Models\RutinaEjercicioSemana;
use App\Models\RutinaEjercicioSerie;
use App\Models\SemanaEntrenamiento;
use App\Policies\EjercicioPolicy;
use App\Policies\RutinaPolicy;
use App\Policies\RegistroSemanalPolicy;
use App\Policies\RutinaEjercicioPolicy;
use App\Policies\RutinaEjercicioSemanaPolicy;
use App\Policies\RutinaEjercicioSeriePolicy;
use App\Policies\SemanaEntrenamientoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Rutina::class => RutinaPolicy::class,
        RutinaEjercicio::class => RutinaEjercicioPolicy::class,
        RutinaEjercicioSemana::class => RutinaEjercicioSemanaPolicy::class,
        RutinaEjercicioSerie::class => RutinaEjercicioSeriePolicy::class,
        SemanaEntrenamiento::class => SemanaEntrenamientoPolicy::class,
        Ejercicio::class => EjercicioPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        // (Opcional) admin bypass si usa roles (Spatie)
        // Gate::before(fn ($user) => $user->hasRole('admin') ? true : null);

        // (Opcional TEMPORAL) logging para saber qué ability está fallando
        Gate::after(function ($user, string $ability, $result, array $arguments) {
            Log::info('GATE CHECK', [
                'user_id' => $user?->id,
                'ability' => $ability,
                'result' => $result,
                'arguments' => array_map(fn($a) => is_object($a) ? get_class($a) : gettype($a), $arguments),
            ]);
        });
    }
}
