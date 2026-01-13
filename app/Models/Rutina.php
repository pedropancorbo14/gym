<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
