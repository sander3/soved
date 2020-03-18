<?php

namespace App\Console\Commands;

use App\Snapshot;
use App\Jobs\CreateSnapshot;
use Illuminate\Console\Command;

class EnqueueSnapshotCreations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'snapshot:create';

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
        Snapshot::each(function ($snapshot) {
            CreateSnapshot::dispatch($snapshot);
        });
    }
}
