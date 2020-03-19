<?php

namespace App\Jobs;

use App\Snapshot;
use Illuminate\Bus\Queueable;
use Spatie\Browsershot\Browsershot;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Spatie\TemporaryDirectory\TemporaryDirectory;

class CreateSnapshot implements ShouldQueue
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
        $temporaryDirectory = (new TemporaryDirectory())->create();
        $path = $temporaryDirectory->path('screenshot.jpeg');

        $screenshot = Browsershot::url($this->snapshot->url)
            ->waitUntilNetworkIdle()
            ->setOption('args', ['--disable-web-security'])
            ->fullPage()
            ->deviceScaleFactor(3)
            ->setScreenshotType('jpeg')
            ->save($path);

        $this->snapshot->addMedia($path)->toMediaCollection();

        $this->snapshot->touch();

        ReorderSnapshotMedia::dispatch($this->snapshot);
    }
}
