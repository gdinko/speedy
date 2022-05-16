<?php

namespace Gdinko\Speedy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Gdinko\Speedy\Skeleton\SkeletonClass
 */
class Speedy extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'speedy';
    }
}
