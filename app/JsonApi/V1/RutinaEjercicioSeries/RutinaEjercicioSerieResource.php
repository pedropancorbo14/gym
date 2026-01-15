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
            'numero_serie' => $this->resource->numero_serie,
            'repeticiones' => $this->resource->repeticiones,
            'peso_kg' => $this->resource->peso_kg,
            'descanso_segundos' => $this->resource->descanso_segundos,
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
