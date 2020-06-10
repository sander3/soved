<?php

namespace App\Console;

use App\Snapshot;
use App\Jobs\FetchGithubPackages;
use App\Jobs\FetchAvailableLotsInAlmere;
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
        $schedule->command('telescope:prune --hours=48')->daily();

        $schedule->job(new FetchGithubPackages())->daily();

        // Run every fifteen minutes from 9 AM to 5 PM on weekdays...
        $schedule->job(new FetchAvailableLotsInAlmere())
            ->weekdays()
            ->everyFifteenMinutes()
            ->between('9:00', '17:00');

        // Run every fifteen minutes from 5 PM to 8 PM on thursdays...
        $schedule->job(new FetchAvailableLotsInAlmere())
            ->thursdays()
            ->everyFifteenMinutes()
            ->between('17:00', '20:00');

        $this->scheduleEnqueueSnapshotCreationsCommands($schedule, Snapshot::FREQUENCIES);
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    private function scheduleEnqueueSnapshotCreationsCommands(Schedule $schedule, array $frequencies): void
    {
        foreach ($frequencies as $frequency) {
            $schedule->command(EnqueueSnapshotCreations::class, ["--frequency={$frequency}"])
                ->$frequency()
                ->at('13:00');
        }
    }
}
