<?php

namespace App\Jobs;

use App\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FetchGithubPackages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $repositories = collect(GitHub::me()->repositories());

        $packages = $repositories->filter(function ($repository) {
            $laravel = starts_with($repository['name'], 'laravel');

            return $laravel && !$repository['private'];
        });

        $packages->each(function ($package) {
            $topics = GitHub::repositories()->topics($package['owner']['login'], $package['name']);

            Package::updateOrCreate(
                [
                    'github_id' => $package['id'],
                ],
                array_merge($package, ['topics' => $topics['names']])
            );
        });
    }
}
