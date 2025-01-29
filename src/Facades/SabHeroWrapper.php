<?php

namespace Fuelviews\SabHeroCore\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fuelviews\SabHeroCore\SabHeroWrapper
 */
class SabHeroWrapper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Fuelviews\SabHeroCore\SabHeroWrapper::class;
    }
}
