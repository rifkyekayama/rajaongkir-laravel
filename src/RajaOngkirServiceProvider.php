<?php

namespace RifkyEkayama\RajaOngkir;

use Illuminate\Support\ServiceProvider;

class RajaOngkirServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
                __DIR__.'/config/rajaongkir.php' => config_path().'/rajaongkir.php',
            ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerRajaOngkir();

        $this->app->alias('rajaOngkir', 'RifkyEkayama\RajaOngkir\Endpoints');
    }

    public function registerRajaOngkir(){
        $this->app->singleton('rajaOngkir', function (){
            return new Endpoints(config('rajaongkir.api_key'), config('rajaongkir.account_type'));
        });
    }
}
