<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Contracts\PackageRepository;

class PackageComposer
{
    protected $packages;

    public function __construct(PackageRepository $packages)
    {
        $this->packages = $packages;
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        $view->with('packages', $this->packages->getLatestInRandomOrder(3));
    }
}
