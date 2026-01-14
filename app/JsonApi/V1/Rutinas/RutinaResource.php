<?php

namespace App\JsonApi\V1\Rutinas;

use App\Models\Rutina;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Rutina $resource
 */
class RutinaResource extends JsonApiResource
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
            'descripcion' => $this->resource->descripcion,
            'diaSemana' => $this->resource->dia_semana,
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
            'ejercicios' => $this->relation('ejercicios')->showDataIfLoaded(),
            'plantillaEjercicios' => $this->relation('plantillaEjercicios')->showDataIfLoaded(),
            'registrosSemanales' => $this->relation('registrosSemanales')->showDataIfLoaded(),
        ];
    }
}
