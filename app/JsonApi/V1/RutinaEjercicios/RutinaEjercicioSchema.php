<?php

namespace App\JsonApi\V1\RutinaEjercicios;

use App\Models\RutinaEjercicio;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class RutinaEjercicioSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = RutinaEjercicio::class;

    public static string $resourceType = 'rutina-ejercicios';


    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),

            Str::make('rutinaId')->sortable(),
            Str::make('ejercicioId')->sortable(),

            Str::make('orden')->sortable(),
            Str::make('seriesObjetivo')->sortable(),
            Str::make('repsObjetivo')->sortable(),
            Str::make('descansoSegundosObjetivo')->sortable(),

            BelongsTo::make('rutina'),
            BelongsTo::make('ejercicio'),

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
