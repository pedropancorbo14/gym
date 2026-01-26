<?php

namespace App\JsonApi\V1\RutinaEjercicioSeries;

use App\Models\RutinaEjercicioSerie;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class RutinaEjercicioSerieSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = RutinaEjercicioSerie::class;

    public static string $resourceType = 'rutina-ejercicio-series';
    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),

            Str::make('rutinaEjercicioSemanaId')->sortable(),
            Str::make('numeroSerie')->sortable(),
            Str::make('repeticiones')->sortable(),
            Str::make('pesoKg')->sortable(),
            Str::make('descansoSegundos')->sortable(),

            BelongsTo::make('rutinaEjercicioSemana')->type('rutina-ejercicio-semanas'),

            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
        ];
    }

    /**
     * Get the resource filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this),
        ];
    }

    /**
     * Get the resource paginator.
     *
     * @return Paginator|null
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make();
    }
}
