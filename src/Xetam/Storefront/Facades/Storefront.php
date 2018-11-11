<?php

namespace Xetam\Storefront\Facades;

use Illuminate\Support\Facades\Facade;

class Storefront extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'storefront';
    }
}
