<?php

namespace Fuelviews\SabHeroWrapper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fuelviews\SabHeroWrapper\SabHeroWrapper
 */
class SabHeroWrapper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Fuelviews\SabHeroWrapper\SabHeroWrapper::class;
    }
}
