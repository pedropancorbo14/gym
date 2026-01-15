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
            'rutinaId' => ['required', 'integer', 'exists:rutinas,id'],
            'ejercicioId' => ['required', 'integer', 'exists:ejercicios,id'],
            'orden' => ['required', 'integer', 'min:1'],
            'seriesObjetivo' => ['required', 'integer', 'min:1'],
            'repsObjetivo' => ['required', 'integer', 'min:1'],
            'descansoSegundosObjetivo' => ['required', 'integer', 'min:0'],
        ];
    }
}
