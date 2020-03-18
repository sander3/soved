<?php

namespace App\Console;

use App\Jobs\FetchGithubPackages;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\EnqueueSnapshotCreations;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new FetchGithubPackages())->daily();

        $schedule->command(EnqueueSnapshotCreations::class)->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
