<?php

namespace RifkyEkayama\RajaOngkir;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RifkyEkayama\RajaOngkir\EndPoints
 */
class RajaOngkirFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rajaOngkir';
    }
}
