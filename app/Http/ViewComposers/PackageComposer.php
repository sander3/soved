<?php

namespace App\Http\ViewComposers;

use App\Package;
use Illuminate\View\View;

class PackageComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        $view->with('packages', Package::inRandomOrder()->take(3)->get()->latest());
    }
}
