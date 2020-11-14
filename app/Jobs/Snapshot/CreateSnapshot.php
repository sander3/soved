<?php

namespace App\Jobs\Snapshot;

use App\Snapshot;
use App\Jobs\OptimizeMedia;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Spatie\MediaLibrary\Support\TemporaryDirectory;
use Soved\Laravel\Snapshot\Contracts\Snapshot as SnapshotContract;

class CreateSnapshot implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 240;

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
    public function handle(SnapshotContract $snapshot)
    {
        $temporaryDirectory = (new TemporaryDirectory())->create();
        $path = $temporaryDirectory->path('screenshot.jpeg');

        $contents = $snapshot->take($this->snapshot->url);

        file_put_contents($path, $contents);

        OptimizeMedia::withChain([
            new AddMediaToSnapshot($this->snapshot, $path),
        ])->dispatch($path);
    }
}
