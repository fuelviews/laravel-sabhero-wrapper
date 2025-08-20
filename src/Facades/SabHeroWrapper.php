<?php

namespace Fuelviews\SabHeroWrapper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string version()
 * @method static bool isFeatureEnabled(string $feature)
 * @method static array getEnabledFeatures()
 *
 * @see \Fuelviews\SabHeroWrapper\SabHeroWrapper
 */
class SabHeroWrapper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'sabhero-wrapper';
    }
}
