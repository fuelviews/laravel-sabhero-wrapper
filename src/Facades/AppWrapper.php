<?php

namespace Fuelviews\AppWrapper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fuelviews\AppWrapper\AppWrapper
 */
class AppWrapper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Fuelviews\AppWrapper\AppWrapper::class;
    }
}
