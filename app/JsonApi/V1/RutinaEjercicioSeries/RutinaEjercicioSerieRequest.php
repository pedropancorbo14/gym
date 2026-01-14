<?php

namespace App\JsonApi\V1\RutinaEjercicioSeries;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class RutinaEjercicioSerieRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'rutinaEjercicioSemanaId' => ['required', Rule::exists('rutina-ejercicio-semanas', 'id')],
            'numeroSerie' => ['required', 'integer', 'min:1'],
            'repeticiones' => ['required', 'integer', 'min:1'],
            'pesoKg' => ['required', 'numeric', 'min:0'],
            'descansoSegundos' => ['required', 'integer', 'min:0'],
        ];
    }
}
