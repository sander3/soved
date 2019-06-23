<?php

namespace App\JobHunt\Nova;

use App\Nova\Resource;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\BelongsTo;

class Vacancy extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\JobHunt\Vacancy';

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
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
            BelongsTo::make('Company')->nullable(),

            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Boolean::make('Remote'),

            Text::make('Main language')
                ->rules('required', 'max:255'),

            Currency::make('Salary')
                ->format('%.2n')
                ->rules('present', 'max:999999', 'min:45000', 'nullable', 'numeric')
                ->nullable(),

            Text::make('URL')
                ->rules('required', 'max:255', 'url')
                ->hideFromIndex(),

            new Panel('Score', $this->scoreFields()),
        ];
    }

    /**
     * Get the score fields for the resource.
     *
     * @return array
     */
    protected function scoreFields()
    {
        $placeholder = ['extraAttributes' => [
            'placeholder' => '1-5',
        ]];

        return [
            Number::make('Age score')
                ->min(1)->max(5)
                ->withMeta($placeholder)
                ->rules('required', 'max:5', 'min:1', 'numeric')
                ->help('Do you meet the average age?')
                ->hideFromIndex(),

            Number::make('Culture score')
                ->min(1)->max(5)
                ->withMeta($placeholder)
                ->rules('required', 'max:5', 'min:1', 'numeric')
                ->help('Does the company have a nice culture?')
                ->hideFromIndex(),

            Number::make('Requirements score')
                ->min(1)->max(5)
                ->withMeta($placeholder)
                ->rules('required', 'max:5', 'min:1', 'numeric')
                ->help('Do you meet the requirements?')
                ->hideFromIndex(),

            Number::make('Stack score')
                ->min(1)->max(5)
                ->withMeta($placeholder)
                ->rules('required', 'max:5', 'min:1', 'numeric')
                ->help('Do you like the stack?')
                ->hideFromIndex(),
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
