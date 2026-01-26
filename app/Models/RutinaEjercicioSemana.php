<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RutinaEjercicioSemana extends Model
{
    use HasFactory;

    protected $table = 'rutina_ejercicio_semanas';

    protected $fillable = [
        'rutina_id',
        'ejercicio_id',
        'semana_entrenamiento_id',
        'series_realizadas',
        'reps_realizadas',
        'peso_kg',
        'descanso_segundos_real',
        'notas',
    ];

    protected $casts = [
        'series_realizadas' => 'integer',
        'reps_realizadas' => 'integer',
        'peso_kg' => 'decimal:2',
        'descanso_segundos_real' => 'integer',
    ];

    public function rutina(): BelongsTo
    {
        return $this->belongsTo(Rutina::class, 'rutina_id');
    }

    public function ejercicio(): BelongsTo
    {
        return $this->belongsTo(Ejercicio::class, 'ejercicio_id');
    }

    public function semanaEntrenamiento(): BelongsTo
    {
        return $this->belongsTo(SemanaEntrenamiento::class, 'semana_entrenamiento_id');
    }

    public function rutinaEjercicioSeries(): HasMany
    {
        return $this->hasMany(RutinaEjercicioSerie::class, 'rutina_ejercicio_semana_id')
            ->orderBy('numero_serie');
    }
}
