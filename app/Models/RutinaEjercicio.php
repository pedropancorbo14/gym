<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RutinaEjercicio extends Model
{
    protected $table = 'rutina_ejercicios';

    protected $fillable = [
        'rutina_id',
        'ejercicio_id',
        'orden',
        'series_objetivo',
        'reps_objetivo',
        'descanso_segundos_objetivo',
    ];

    protected $casts = [
        'orden' => 'integer',
        'series_objetivo' => 'integer',
        'reps_objetivo' => 'integer',
        'descanso_segundos_objetivo' => 'integer',
    ];

    public function rutina(): BelongsTo
    {
        return $this->belongsTo(Rutina::class, 'rutina_id');
    }

    public function ejercicio(): BelongsTo
    {
        return $this->belongsTo(Ejercicio::class, 'ejercicio_id');
    }
}
