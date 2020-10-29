<?php

/*
 * This file is part of the pretendtrue/laravel-builder.
 *
 * (c) pretendtrue <play@pretendtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PretendTrue\LaravelBuilder\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'builder:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the Builder resources';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing Builder Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'builder-assets']);

        $this->comment('Publishing Builder Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'builder-config']);

        $this->info('Builder scaffolding installed successfully.');
    }
}
