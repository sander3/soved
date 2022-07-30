<?php

namespace App\Console\Commands\Janitor;

use Illuminate\Console\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MoveMediaToS3 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'janitor:move-media-to-s3';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move media to S3';

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
     * @return int
     */
    public function handle()
    {
        Media::query()
            ->where('disk', '<>', 's3')
            ->eachById(function (Media $media) {
                $model = $media->model()
                    ->without('media')
                    ->firstOrFail();

                $media->move($model, diskName: 's3');

                $model->forgetRouteCache();
            });
    }
}
