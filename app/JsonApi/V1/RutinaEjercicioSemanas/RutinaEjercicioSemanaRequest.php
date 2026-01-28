<?php

namespace App\JsonApi\V1\RutinaEjercicioSemanas;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class RutinaEjercicioSemanaRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'rutinaId' => ['required', 'string', 'exists:rutinas,id'],
            'ejercicioId' => ['required', 'string', 'exists:ejercicios,id'],
            'semanaEntrenamientoId' => ['required', 'string', 'exists:semanas_entrenamiento,id'],
            'seriesRealizadas' => ['nullable', 'integer', 'min:0'],
            'repsRealizadas' => ['nullable', 'integer', 'min:0'],
            'pesoKg' => ['nullable', 'numeric', 'min:0'],
            'descansoSegundosReal' => ['nullable', 'integer', 'min:0'],
            'notas' => ['nullable', 'string'],
        ];
    }
}
