<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ejercicio extends Model
{

    use HasFactory;

    protected $table = 'ejercicios';

    protected $fillable = [
        'nombre',
        'grupo_muscular',
        'descripcion',
    ];

    public function rutinas(): BelongsToMany
    {
        return $this->belongsToMany(Rutina::class, 'rutina_ejercicios', 'ejercicio_id', 'rutina_id')
            ->withPivot([
                'id',
                'orden',
                'series_objetivo',
                'reps_objetivo',
                'descanso_segundos_objetivo',
            ])
            ->withTimestamps();
    }

    public function rutinaEjercicios(): HasMany
    {
        return $this->hasMany(RutinaEjercicio::class, 'ejercicio_id');
    }

    public function rutinaEjercicioSemanas(): HasMany
    {
        return $this->hasMany(RutinaEjercicioSemana::class, 'ejercicio_id');
    }
}
