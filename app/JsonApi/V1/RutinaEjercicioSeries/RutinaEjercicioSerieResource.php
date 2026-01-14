<?php

namespace App\JsonApi\V1\RutinaEjercicioSeries;

use App\Models\RutinaEjercicioSerie;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property RutinaEjercicioSerie $resource
 */
class RutinaEjercicioSerieResource extends JsonApiResource
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
            'rutinaEjercicioSemanaId' => $this->resource->rutina_ejercicio_semana_id,
            'numeroSerie' => $this->resource->numero_serie,
            'repeticiones' => $this->resource->repeticiones,
            'pesoKg' => $this->resource->peso_kg,
            'descansoSegundos' => $this->resource->descanso_segundos,
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
            'rutinaEjercicioSemana' => $this->relation('rutinaEjercicioSemana')->showDataIfLoaded(),
        ];
    }
}
