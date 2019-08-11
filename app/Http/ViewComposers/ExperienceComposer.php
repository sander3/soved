<?php

namespace App\Http\ViewComposers;

use App\Experience;
use Illuminate\View\View;

class ExperienceComposer
{
    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     */
    public function compose(View $view)
    {
        $view->with(
            'experiences',
            Experience::orderBy('start_year', 'desc')
                ->take(5)
                ->get()
        );
    }
}
