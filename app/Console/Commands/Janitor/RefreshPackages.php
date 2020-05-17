<?php

namespace App\Console\Commands\Janitor;

use App\Package;
use Illuminate\Console\Command;
use App\Jobs\FetchGithubPackages;

class RefreshPackages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:packages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh packages';

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
        foreach (Package::cursor() as $package) {
            $package->delete();
        }

        FetchGithubPackages::dispatch();
    }
}
