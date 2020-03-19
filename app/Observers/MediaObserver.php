<?php

namespace App\Observers;

use App\Jobs\OptimizeMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaObserver
{
    /**
     * Handle the media "created" event.
     *
     * @return void
     */
    public function created(Media $media)
    {
        OptimizeMedia::dispatch($media);
    }

    /**
     * Handle the media "updated" event.
     *
     * @return void
     */
    public function updated(Media $media)
    {
    }

    /**
     * Handle the media "deleted" event.
     *
     * @return void
     */
    public function deleted(Media $media)
    {
    }

    /**
     * Handle the media "restored" event.
     *
     * @return void
     */
    public function restored(Media $media)
    {
    }

    /**
     * Handle the media "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Media $media)
    {
    }
}
