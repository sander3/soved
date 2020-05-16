<?php

namespace App\Observers;

use App\Snapshot;
use App\Jobs\Snapshot\CreateSnapshot;

class SnapshotObserver
{
    /**
     * Handle the snapshot "created" event.
     *
     * @return void
     */
    public function created(Snapshot $snapshot)
    {
        CreateSnapshot::dispatch($snapshot);
    }

    /**
     * Handle the snapshot "updated" event.
     *
     * @return void
     */
    public function updated(Snapshot $snapshot)
    {
        $snapshot->forgetRouteCache();
    }

    /**
     * Handle the snapshot "deleted" event.
     *
     * @return void
     */
    public function deleted(Snapshot $snapshot)
    {
    }

    /**
     * Handle the snapshot "restored" event.
     *
     * @return void
     */
    public function restored(Snapshot $snapshot)
    {
    }

    /**
     * Handle the snapshot "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Snapshot $snapshot)
    {
    }
}
