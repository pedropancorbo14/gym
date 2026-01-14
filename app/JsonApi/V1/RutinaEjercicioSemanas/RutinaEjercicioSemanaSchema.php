<?php

namespace App\JsonApi\V1\RutinaEjercicioSemanas;

use App\Models\RutinaEjercicioSemana;
use Illuminate\Support\Str;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\HasMany;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class RutinaEjercicioSemanaSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = RutinaEjercicioSemana::class;

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
            Str::make('semanaEntrenamientoId')->sortable(),
            Str::make('seriesRealizadas')->sortable(),
            Str::make('repsRealizadas')->sortable(),
            Str::make('pesoKg')->sortable(),
            Str::make('descansoSegundosReal')->sortable(),
            Str::make('notas')->sortable(),

            BelongsTo::make('rutina'),
            BelongsTo::make('ejercicio'),
            BelongsTo::make('semanaEntrenamiento'),
            HasMany::make('series'),

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
