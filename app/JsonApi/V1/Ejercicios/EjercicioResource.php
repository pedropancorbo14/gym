<?php

namespace App\JsonApi\V1\Ejercicios;

use App\Models\Ejercicio;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Ejercicio $resource
 */
class EjercicioResource extends JsonApiResource
{

    /**
     * Get the resource's attributes.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function attributes($request): iterable
    {
        return [
            'nombre' => $this->resource->nombre,
            'grupoMuscular' => $this->resource->grupo_muscular,
            'descripcion' => $this->resource->descripcion,
            'createdAt' => $this->resource->created_at,
            'updatedAt' => $this->resource->updated_at,
        ];
    }

    /**
     * Get the resource's relationships.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function relationships($request): iterable
    {
        return [
            'rutinas' => $this->relation('rutinas')->showDataIfLoaded(),
            'rutinaEjercicios' => $this->relation('rutinaEjercicios')->showDataIfLoaded(),
            'rutinaEjercicioSemanas' => $this->relation('rutinaEjercicioSemanas')->showDataIfLoaded(),
        ];
    }
}
