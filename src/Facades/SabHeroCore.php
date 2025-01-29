<?php

namespace Fuelviews\SabHeroCore\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fuelviews\SabHeroCore\SabHeroCore
 */
class SabHeroCore extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Fuelviews\SabHeroCore\SabHeroCore::class;
    }
}
