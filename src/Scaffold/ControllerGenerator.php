<?php

namespace PretendTrue\LaravelBuilder\Scaffold;

use Illuminate\Filesystem\Filesystem;

class ControllerGenerator extends Generator
{
    /**
     * ControllerGenerator constructor.
     *
     * @param Filesystem|null $files
     */
    public function __construct(Filesystem $files = null)
    {
        $this->files = $files ?: app('files');
    }

    /**
     * Create a controller file.
     *
     * @param $name
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function builder($name)
    {
        $className = ucfirst($name) . 'Controller';
        $path = app_path("Http/Controllers/{$className}.php");

        $stub = $this->files->get($this->getStub('controller'));

        $stub = $this->replaceClassName($stub, $className)
            ->getContent($stub);

        $this->files->put($path, $stub);

        return $path;
    }
}