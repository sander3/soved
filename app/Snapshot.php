<?php

namespace App;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Snapshot extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Actionable;

    const FREQUENCIES = ['daily', 'weekly'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'url',
        'frequency',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->crop(Manipulations::CROP_CENTER, 250, 250);
    }
}
