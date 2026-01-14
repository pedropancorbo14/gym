<?php

namespace App\JsonApi\V1\RutinaEjercicios;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class RutinaEjercicioRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'ejercicio_id' => ['required', Rule::exists('ejercicios', 'id')],
            'rutina_id' => ['required', Rule::exists('rutinas', 'id')],
            'orden' => ['required', 'integer', 'min:1'],
            'series_objetivo' => ['required', 'integer', 'min:1'],
            'reps_objetivo' => ['required', 'integer', 'min:1'],
            'descanso_segundos_objetivo' => ['required', 'integer', 'min:0'],
        ];
    }
}
