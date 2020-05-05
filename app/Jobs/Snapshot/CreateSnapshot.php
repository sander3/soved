<?php

namespace App\Jobs\Snapshot;

use App\Snapshot;
use App\Jobs\OptimizeMedia;
use Illuminate\Bus\Queueable;
use Spatie\Browsershot\Browsershot;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Spatie\MediaLibrary\Support\TemporaryDirectory;

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
    public $timeout = 120;

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
        $temporaryDirectory = (new TemporaryDirectory())->create();
        $path = $temporaryDirectory->path('screenshot.jpeg');

        Browsershot::url($this->snapshot->url)
            ->timeout(90)
            ->waitUntilNetworkIdle(false)
            ->setOption('args', ['--disable-web-security'])
            ->fullPage()
            ->deviceScaleFactor(3)
            ->setScreenshotType('jpeg')
            ->save($path);

        OptimizeMedia::withChain([
            new AddMediaToSnapshot($this->snapshot, $path),
        ])->dispatch($path);
    }
}
