<?php

namespace App\Jobs;

use App\Package;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FetchGithubPackages implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Execute the job.
     */
    public function handle()
    {
        $repositories = collect(GitHub::me()->repositories());

        $packages = $repositories->filter(function ($repository) {
            $laravel = Str::startsWith($repository['name'], 'laravel');

            return $laravel && ! $repository['private'] && ! $repository['archived'];
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
