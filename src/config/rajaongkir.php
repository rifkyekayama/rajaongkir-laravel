<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Account Type
    |--------------------------------------------------------------------------
    |
    | Isi dengan (starter, basic, pro)
    |
    */

	'account_type' => env('RAJAONGKIR_ACCOUNT_TYPE', 'pro'),

	/*
    |--------------------------------------------------------------------------
    | Api key
    |--------------------------------------------------------------------------
    |
    | Isi dengan api key yang didapatkan dari rajaongkir
    |
    */

	'api_key' => env('RAJAONGKIR_APIKEY', 'SomeRandomString'),
];