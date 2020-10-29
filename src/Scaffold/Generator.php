<?php

namespace PretendTrue\LaravelBuilder\Scaffold;

class Generator
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Get stub path.
     *
     * @param $name
     * @return string
     */
    protected function getStub($name)
    {
        return __DIR__ . "/stubs/{$name}.stub";
    }

    /**
     * Replace class dummy.
     *
     * @param $stub
     * @param $class
     * @return $this
     */
    protected function replaceClassName(& $stub, $class)
    {
        $stub = str_replace('DummyClass', $class, $stub);

        return $this;
    }

    /**
     * Get stub content.
     *
     * @param $stub
     * @return mixed
     */
    protected function getContent($stub)
    {
        return $stub;
    }
}