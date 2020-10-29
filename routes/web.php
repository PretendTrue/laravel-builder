<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::post('scaffold', 'ScaffoldController@store');
});

Route::get('/{view?}', 'HomeController@index');
