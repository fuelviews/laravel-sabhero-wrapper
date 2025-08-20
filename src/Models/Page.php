<?php

namespace Fuelviews\SabHeroWrapper\Models;

use Fuelviews\SabHeroWrapper\Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @method static where(string $string, string|null $routeName)
 */
class Page extends Model implements HasMedia
{
    use HasFactory;
    use HasSEO;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'feature_image',
    ];

    protected static function newFactory(): PageFactory
    {
        return PageFactory::new();
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: ucfirst($this->title ?? ''),
            description: ucfirst($this->description ?? ''),
            image: $this->getFirstMediaUrl('page_feature_image'),
        );
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('page_feature_image')
            ->withResponsiveImages()
            ->performOnCollections('page_feature_image');
    }
}
