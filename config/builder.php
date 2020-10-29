<?php

/*
 * This file is part of the pretendtrue/laravel-builder.
 *
 * (c) pretendtrue <play@pretendtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Builder Domain
    |--------------------------------------------------------------------------
    |
    | This is the subdomain where Builder will be accessible from.
    |
    */

    'domain' => env('BUILDER_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | Builder Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Builder will be accessible from.
    |
    */

    'path' => env('BUILDER_PATH', 'builder'),

    /*
    |--------------------------------------------------------------------------
    | Builder Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Builder route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => [
        'web',
    ],
];
