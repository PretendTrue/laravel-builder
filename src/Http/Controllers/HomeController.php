<?php

namespace PretendTrue\LaravelBuilder\Http\Controllers;

use PretendTrue\LaravelBuilder\Builder;

class HomeController
{
    public function index()
    {
        return view('builder::layout', [
            'builderScriptVariables' => Builder::scriptVariables()
        ]);
    }
}