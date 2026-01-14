<?php

namespace App\JsonApi\V1\SemanaEntrenamientos;

use App\Models\SemanaEntrenamiento;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property SemanaEntrenamiento $resource
 */
class SemanaEntrenamientoResource extends JsonApiResource
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
            'fechaInicio' => $this->resource->fecha_inicio,
            'fechaFin' => $this->resource->fecha_fin,
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
            // @TODO
        ];
    }
}
