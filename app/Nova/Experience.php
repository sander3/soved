<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Spatie\NovaTranslatable\Translatable;

class Experience extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Experience';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'organization';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'organization',
        'role',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Organization')
                ->sortable()
                ->rules('required', 'max:255'),

            Translatable::make([
                Text::make('Role')
                    ->rules('required', 'max:255'),
            ]),

            Text::make('Start year')
                ->rules('required', 'date_format:Y'),

            Text::make('End year')
                ->rules('present', 'nullable')
                ->nullable()
                ->nullValues([__('experience.now')])
                ->displayUsing(function ($value) {
                    return $value === __('experience.now') ? '-' : $value;
                }),

            Text::make('Logo')
                ->rules('required', 'max:255'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
