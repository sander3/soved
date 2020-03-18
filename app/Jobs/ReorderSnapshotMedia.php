<?php

namespace App\Jobs;

use App\Snapshot;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ReorderSnapshotMedia implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $snapshot;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Snapshot $snapshot)
    {
        $this->snapshot = $snapshot;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ids = $this->snapshot->media()->latest()->pluck('id')->toArray();

        Media::setNewOrder($ids);
    }
}
