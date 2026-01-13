<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SemanaEntrenamiento extends Model
{
    protected $table = 'semanas_entrenamiento';

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function registrosEjercicios(): HasMany
    {
        return $this->hasMany(RutinaEjercicioSemana::class, 'semana_entrenamiento_id');
    }
}
