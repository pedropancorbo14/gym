<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RutinaEjercicioSerie extends Model
{
    protected $table = 'rutina_ejercicio_series';

    protected $fillable = [
        'rutina_ejercicio_semana_id',
        'numero_serie',
        'repeticiones',
        'peso_kg',
        'descanso_segundos',
    ];

    protected $casts = [
        'numero_serie' => 'integer',
        'repeticiones' => 'integer',
        'peso_kg' => 'decimal:2',
        'descanso_segundos' => 'integer',
    ];

    public function registroSemanal(): BelongsTo
    {
        return $this->belongsTo(RutinaEjercicioSemana::class, 'rutina_ejercicio_semana_id');
    }
}
