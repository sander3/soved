<?php

namespace App\Console\Commands;

use App\Snapshot;
use Illuminate\Console\Command;
use App\Jobs\Snapshot\CreateSnapshot;

class EnqueueSnapshotCreations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'snapshot:create {--frequency=daily}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new snapshots';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $frequency = array_search($this->option('frequency'), Snapshot::FREQUENCIES);

        $snapshots = Snapshot::where('frequency', $frequency)->cursor();

        foreach ($snapshots as $snapshot) {
            CreateSnapshot::dispatch($snapshot);
        }
    }
}
