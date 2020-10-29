<?php

namespace PretendTrue\LaravelBuilder\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'builder:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all of the Builder resources';

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
        $this->call('vendor:publish', [
            '--tag' => 'builder-assets',
            '--force' => true,
        ]);
    }
}
