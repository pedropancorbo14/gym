<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Testing\Fluent\Concerns\Has;

class Rutina extends Model
{
    use HasFactory;

    protected $table = 'rutinas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'dia_semana',
    ];
    public function ejercicios(): BelongsToMany
    {
        return $this->belongsToMany(Ejercicio::class, 'rutina_ejercicios', 'rutina_id', 'ejercicio_id')
            ->withPivot([
                'id',
                'orden',
                'series_objetivo',
                'reps_objetivo',
                'descanso_segundos_objetivo',
            ])
            ->withTimestamps()
            ->orderBy('pivot_orden');
    }

    public function rutinaEjercicios(): HasMany
    {
        return $this->hasMany(RutinaEjercicio::class, 'rutina_id');
    }

    public function rutinaEjercicioSemanas(): HasMany
    {
        return $this->hasMany(RutinaEjercicioSemana::class, 'rutina_id');
    }
}
