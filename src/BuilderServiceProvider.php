<?php

namespace PretendTrue\LaravelBuilder;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $this->registerCommands();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerResources();
        $this->defineAssetPublishing();
    }

    /**
     * Register the Builder routes.
     * 注册生成器的路由。
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'domain' => config('builder.domain', null),
            'prefix' => config('builder.path'),
            'namespace' => 'PretendTrue\LaravelBuilder\Http\Controllers',
            'middleware' => config('builder.middleware', 'web'),
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Register the Builder resources.
     * 注册生成器的资源文件。
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'builder');
    }

    /**
     * Define the asset publishing configuration.
     * 定义资源文件发布配置。
     *
     *
     * @return void
     */
    protected function defineAssetPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/builder'),
            ], 'builder-assets');

            $this->publishes([
                __DIR__ . '/../config/builder.php' => config_path('builder.php'),
            ], 'builder-config');
        }
    }

    /**
     * Setup the configuration for Builder.
     * 设置生成器的配置。
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/builder.php', 'builder'
        );
    }

    /**
     * Register the Horizon Artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\ClearCommand::class,
                Console\InstallCommand::class,
                Console\PublishCommand::class,
            ]);
        }
    }
}
