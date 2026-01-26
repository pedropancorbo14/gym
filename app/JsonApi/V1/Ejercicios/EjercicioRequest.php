<?php

namespace App\JsonApi\V1\Ejercicios;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class EjercicioRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'max:255'],
            'grupo_muscular' => ['required', 'max:255'],
            'descripcion' => ['nullable'],
            'rutinas' => JsonApiRule::toMany(),
            'rutinaEjercicios' => JsonApiRule::toMany(),
            'rutinaEjercicioSemanas' => JsonApiRule::toMany(),
        ];
    }
}
