<?php

namespace PretendTrue\LaravelBuilder\Scaffold;

use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\Migrations\MigrationCreator as BaseMigrationCreator;

class MigrationGenerator extends BaseMigrationCreator
{
    /**
     * @var string
     */
    private $tableStructure = '';

    /**
     * @var string
     */
    private $comment = '';

    /**
     * Create a new migration creator instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  string  $comment
     *
     * @return void
     */
    public function __construct(Filesystem $files, $comment = '')
    {
        parent::__construct($files, __DIR__ . '/stubs');

        $this->comment = $comment;
    }

    /**
     * Create a migration file
     *
     * @param $table
     * @param $fields
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function builder($table, $fields)
    {
        $table = Str::plural($table);

        $migrationName = "create_{$table}_table";

        $path = $this->getPath($migrationName, database_path('migrations'));

        $this->ensureMigrationDoesntAlreadyExist($migrationName, database_path('migrations'));

        $stub = $this->files->get(__DIR__.'/stubs/migration.stub');

        $stub = $this->buildingTableStructure($fields)
                     ->populateStub($migrationName, $stub, $table);

        $this->files->put($path, $stub);

        return $path;
    }

    /**
     * Populate the place-holders in the migration stub.
     *
     * @param  string  $name
     * @param  string  $stub
     * @param  string|null  $table
     * @return string
     */
    protected function populateStub($name, $stub, $table)
    {
        $stub = str_replace(
            [
                'DummyClass',
                'DummyTable',
                'DummyStructure',
                'DummyComment'
            ],
            [
                $this->getClassName($name),
                $table,
                $this->tableStructure,
                $this->comment
            ],
            $stub
        );

        return $stub;
    }

    /**
     * Build the table blueprint.
     *
     * @param $fields
     * @return $this
     * @throws \Exception
     */
    private function buildingTableStructure($fields)
    {
        $fields = array_filter($fields, function ($field) {
            return isset($field['column']) && ! empty($field['column']);
        });

        if (empty($fields)) {
            throw new \Exception('Table fields can\'t be empty');
        }

        $rows = [];

        foreach ($fields as $field) {
            $column = "\$table->{$field['type']}('{$field['column']}')";

            if ($field['key']) {
                $column .= "->{$field['key']}()";
            }

            $hasDefault = isset($field['default'])
                && ! is_null($field['default'])
                && $field['default'] !== '';
            if ($hasDefault) {
                $column .= "->default('{$field['default']}')";
            }

            if ($field['nullable']) {
                $column .= '->nullable()';
            } elseif (! $hasDefault && $field['type'] === 'string') {
                $column .= "->default('')";
            }

            if ($field['comment']) {
                $column .= "->comment('{$field['comment']}')";
            }

            $column .= ";\n";

            $rows[] = $column;
        }

        $this->tableStructure = trim(implode(str_repeat(' ', 12), $rows), "\n");

        return $this;
    }
}