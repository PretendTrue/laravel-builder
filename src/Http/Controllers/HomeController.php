<?php

/*
 * This file is part of the pretendtrue/laravel-builder.
 *
 * (c) pretendtrue <play@pretendtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PretendTrue\LaravelBuilder\Http\Controllers;

use PretendTrue\LaravelBuilder\Builder;

class HomeController
{
    public function index()
    {
        return view('builder::layout', [
            'builderScriptVariables' => Builder::scriptVariables(),
        ]);
    }
}
