<?php

return [
    /*
     * A policy will determine which Feature-Policy headers will be set.
     * A valid policy extends `Mazedlx\FeaturePolicy\Policies\Policy`
     */
    'policy' => App\Policies\FeaturePolicy::class,

    /*
     * Feature-policy headers will only be added if this is set to true
     */
    'enabled' => env('FPH_ENABLED', true),
];
