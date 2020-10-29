<?php

/*
 * This file is part of the pretendtrue/laravel-builder.
 *
 * (c) pretendtrue <play@pretendtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::post('scaffold', 'ScaffoldController@store');
});

Route::get('/{view?}', 'HomeController@index');
