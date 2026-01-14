<?php

namespace App\JsonApi\V1\RutinaEjercicios;

use App\Models\RutinaEjercicio;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property RutinaEjercicio $resource
 */
class RutinaEjercicioResource extends JsonApiResource
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
            'rutinaId' => $this->resource->rutina_id,
            'ejercicioId' => $this->resource->ejercicio_id,
            'orden' => $this->resource->orden,
            'seriesObjetivo' => $this->resource->series_objetivo,
            'repsObjetivo' => $this->resource->reps_objetivo,
            'descansoSegundosObjetivo' => $this->resource->descanso_segundos_objetivo,
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
