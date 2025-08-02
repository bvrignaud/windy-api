<?php

namespace Benoit VRIGNAUD\WindyApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Benoit VRIGNAUD\WindyApi\WindyApi
 */
class WindyApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Benoit VRIGNAUD\WindyApi\WindyApi::class;
    }
}
