<?php

namespace App\JobHunt\Nova;

use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use App\JobHunt\VacancyLog as Model;

class VacancyLog extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\JobHunt\VacancyLog';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Job Hunt';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'subject';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'subject',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('Vacancy'),

            ID::make()->sortable(),

            Select::make('Type')
                ->options(Model::TYPES)
                ->sortable()
                ->rules('required', 'integer')
                ->displayUsing(function ($value) {
                    return Model::TYPES[$value];
                }),

            Trix::make('Message')
                ->rules('required', 'string')
                ->alwaysShow(),

            Text::make('Sender')
                ->sortable()
                ->rules('present', 'max:255', 'nullable')
                ->nullable()
                ->hideFromIndex(),

            Text::make('Recipient')
                ->sortable()
                ->rules('present', 'max:255', 'nullable')
                ->nullable()
                ->hideFromIndex(),

            Text::make('Subject')
                ->rules('present', 'max:255', 'nullable')
                ->nullable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
