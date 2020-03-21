<?php

namespace App\Console\Commands\Janitor;

use App\Jobs\OptimizeMedia;
use Illuminate\Console\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class OptimizeExistingMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize:media';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize existing media';

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
        foreach (Media::cursor() as $media) {
            OptimizeMedia::dispatch($media);
        }
    }
}
