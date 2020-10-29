<?php

/*
 * This file is part of the pretendtrue/laravel-builder.
 *
 * (c) pretendtrue <play@pretendtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PretendTrue\LaravelBuilder\Scaffold;

use Illuminate\Filesystem\Filesystem;

class ControllerGenerator extends Generator
{
    /**
     * ControllerGenerator constructor.
     */
    public function __construct(Filesystem $files = null)
    {
        $this->files = $files ?: app('files');
    }

    /**
     * Create a controller file.
     *
     * @param $name
     *
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function builder($name)
    {
        $className = ucfirst($name).'Controller';
        $path = app_path("Http/Controllers/{$className}.php");

        $stub = $this->files->get($this->getStub('controller'));

        $stub = $this->replaceClassName($stub, $className)
            ->getContent($stub);

        $this->files->put($path, $stub);

        return $path;
    }
}
