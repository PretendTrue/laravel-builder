<?php

namespace PretendTrue\LaravelBuilder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use PretendTrue\LaravelBuilder\Scaffold\ModelGenerator;
use PretendTrue\LaravelBuilder\Scaffold\PolicyGenerator;
use PretendTrue\LaravelBuilder\Scaffold\RequestGenerator;
use PretendTrue\LaravelBuilder\Scaffold\ResourceGenerator;
use PretendTrue\LaravelBuilder\Scaffold\MigrationGenerator;
use PretendTrue\LaravelBuilder\Scaffold\ControllerGenerator;

class ScaffoldController
{
    public function store(Request $request)
    {
        $paths = [];

        $name = $request->name;
        $fields = $request->fields;
        $comment = $request->comment;

        try {
            // Create controller
            $paths['controller'] = (new ControllerGenerator())->builder($name);

            // Create form request
            $paths['request'] = (new RequestGenerator())->builder($name);

            // Create resource
            $paths['resource'] = (new ResourceGenerator())->builder($name);

            // Create policy
            $paths['policy'] = (new PolicyGenerator())->builder($name);

            // Create model
            $paths['model'] = (new ModelGenerator())->builder($name, $fields);

            // Create migration.
            $paths['migration'] = (new MigrationGenerator(app('files'), $comment))->builder($name, $fields);

            // Run migrate.
            Artisan::call('migrate');
            $paths['artisan_message'] = Artisan::output();

        } catch (\Exception $exception) {
            // Delete generated files if exception thrown.
            app('files')->delete($paths);

            abort(422, $exception->getMessage());
        }

        return response()->json($paths);
    }
}