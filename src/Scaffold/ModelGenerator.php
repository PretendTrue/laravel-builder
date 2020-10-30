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

class ModelGenerator extends Generator
{
    /**
     * ModelGenerator constructor.
     */
    public function __construct(Filesystem $files = null)
    {
        $this->files = $files ?: app('files');
    }

    /**
     * Create a model file.
     *
     * @param null  $name
     * @param array $fields
     *
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function builder($name = null, $fields = [])
    {
        $className = is_null($name) ? 'Model' : $name;
        $path = app_path("Models/{$className}.php");

        if (!is_null($name) && $this->files->missing(app_path('Models/Model.php'))) {
            $this->builder();
        }

        $stubName = is_null($name) ? 'base_model' : 'model';
        $stub = $this->files->get($this->getStub($stubName));

        $stub = $this->replaceClassName($stub, $className)
            ->replaceSoftDeletes($stub, true)
            ->replaceFields($stub, $fields)
            ->getContent($stub);

        $this->files->put($path, $stub);

        return $path;
    }

    /**
     * Replace soft-deletes dummy.
     *
     * @param string $stub
     * @param bool   $softDeletes
     *
     * @return $this
     */
    private function replaceSoftDeletes(&$stub, $softDeletes)
    {
        $import = $use = '';

        if ($softDeletes) {
            $import = 'use Illuminate\\Database\\Eloquent\\SoftDeletes;';
            $use = 'use SoftDeletes;';
        }

        $stub = str_replace(['DummyImportSoftDeletesTrait', 'DummyUseSoftDeletesTrait'], [$import, $use], $stub);

        return $this;
    }

    /**
     * Replace dummy fields.
     *
     * @param $stub
     * @param $fields
     *
     * @return $this
     */
    private function replaceFields(&$stub, $fields)
    {
        $fillable = '';

        foreach ($fields as $field) {
            $fillable .= "'{$field['column']}', ";
        }

        $fillable = trim($fillable);

        $stub = str_replace(['DummyFields'], [$fillable], $stub);

        return $this;
    }
}
