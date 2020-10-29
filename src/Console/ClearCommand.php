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

class ClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'builder:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all entries from Builder';

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
        $this->comment('Clear Builder Assets...');
        $this->laravel['files']->deleteDirectory(public_path('vendor/builder'));

        $this->comment('Clear Builder Configuration...');
        $this->laravel['files']->delete(config_path('builder.php'));

        $this->info('Builder entries cleared!');
    }
}
