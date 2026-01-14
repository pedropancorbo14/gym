<?php

namespace App\JsonApi\V1\RutinaEjercicioSemanas;

use App\Models\RutinaEjercicioSemana;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property RutinaEjercicioSemana $resource
 */
class RutinaEjercicioSemanaResource extends JsonApiResource
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
            'semanaEntrenamientoId' => $this->resource->semana_entrenamiento_id,
            'seriesRealizadas' => $this->resource->series_realizadas,
            'repsRealizadas' => $this->resource->reps_realizadas,
            'pesoKg' => $this->resource->peso_kg,
            'descansoSegundosReal' => $this->resource->descanso_segundos_real,
            'notas' => $this->resource->notas,
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
