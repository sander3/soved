<?php

namespace App;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Soved\Laravel\Helpers\Traits\CachedRouteModelBinding;

class Snapshot extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Actionable;
    use CachedRouteModelBinding;

    public const FREQUENCIES = ['daily', 'weekly'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['media'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['thumbnail_url'];

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

    public function media(): MorphMany
    {
        return $this->morphMany(config('media-library.media_model'), 'model')->ordered();
    }

    public function getThumbnailUrlAttribute(): string
    {
        $media = $this->getFirstMedia();

        if (! $media) {
            return $this->getFallbackMediaUrl();
        }

        if ($media->hasGeneratedConversion('thumbnail')) {
            return $media->getUrl('thumbnail');
        }

        return $media->getUrl();
    }
}
