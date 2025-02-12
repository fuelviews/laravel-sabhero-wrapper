<?php

namespace Fuelviews\SabHeroWrapper\Models;

use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

/**
 * @method static where(string $string, string|null $routeName)
 */
class Page extends Model
{
    use HasSEO;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'feature_image',
    ];

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: ucwords($this->title),
            description: ucfirst($this->description),
            image: $this->feature_image,
        );
    }
}
